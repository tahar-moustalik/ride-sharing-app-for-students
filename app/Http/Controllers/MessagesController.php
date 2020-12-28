<?php
namespace App\Http\Controllers;

use App\Utilisateur;
use Carbon\Carbon;
use App\Profils;
use DB;
use Illuminate\Http\Request;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
    public function index(Request $request)
    {
        $infos=[];
        $threads = Thread::getAllLatest()->get();

        foreach ($threads as $thread) {
            $users = Message::where('thread_id', $thread->id)->get();
            $photo= Profils::where('id_user', $users[0]->user_id)
              ->select('photo')->get();
            $login= Utilisateur::where('id_user', $users[0]->user_id)
               ->select('login', 'id_user')->get();
            Carbon::setLocale('fr');
            if ($login[0]['login'] != Auth::user()->login) {
                $infos[]= ['id'=>$thread->id,'subject' => $thread->subject,
      'created'=>$thread->created_at->diffForHumans(),'updated'=>$thread->updated_at
    ,'body'=>$users[0]->body,'id_user' => $login[0]->id_user,'login'=>$login[0]->login,
       'photo'=>$photo[0]->photo,'type'=>$users[0]->type_mess,'id_trns' => $users[0]->id_trns,'type_thread'=>$thread->type_thread];
            }
        }
        return response()->json($infos);
    }
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $userId = Auth::id();
        $users = Utilisateur::whereNotIn('id_user', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('show', compact('thread', 'users'));
    }
    public function create()
    {
        $users = Utilisateur::where('id_user', '!=', Auth::id())->get();
        return view('create')->with('users', $users);
    }

    public function store()
    {
        $input = Input::all();
        $thread = new Thread();
        $thread->subject = $input['subject'];
        $thread->type_thread = 0;
        $thread->save();
        /*$thread = Thread::create([
            'subject' => $input['subject'],
            'type_thread' => 0,
        ]);   */
        // Message
        $login= Utilisateur::where('login', $input['to_email'])->get();
        /* Message::create([
             'thread_id' => $thread->id,
             'user_id' => Auth::id(),
             'body' => $input['message'],
             'type_mess' => 0,

         ]);  */
        $message  = new Message();
        $message->thread_id = $thread->id;
        $message->user_id = Auth::id();
        $message->body = $input['message'];
        $message->type_mess = 0;
        $message->save();
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);
        // Recipients
        $thread->addParticipant($login[0]->id_user);
        return redirect()->route('messages.create');
    }
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => Input::get('message'),
        ]);
        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect()->route('messages.show', $id);
    }
}
