<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Utilisateur;
use App\Trajets;
use App\Transaction;
use Illuminate\Support\Str;
use Mail;
use DB;
use Carbon\Carbon;
use App\preferences;
use App\Profils;
use App\Vehicule;
use Illuminate\Support\Facades\Input;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use App\Mail\verifyEmail;
use Illuminate\Support\Facades\Auth;
use Hash;
class UserController extends Controller{

  private $thisUser;

  public function QRCodeTest(Request $request){
      if(isset($_POST["ref"])){
$ref = $_POST["ref"];
$data = explode('-',$ref);
$str = "";
for($i= 0;$i<count($data);$i++){
 $tmp = explode(',',$data[$i]);
 $str .= "reference ". $tmp[0] . "qte" . $tmp[1] ."\n";

}
echo $str;
}

else{

/*$user_pass = $_POST["password"];
$mysql_qry = "select * from employee_data where username like '$user_name' and password like '$user_pass';";
$result = mysqli_query($conn ,$mysql_qry);*/
echo "nothing";
}
  }
  public function postSignUp(Request $request){
    $this->validate($request,[
     'login' => 'unique:utilisateur|required',
     'email' => 'required|email|unique:utilisateur',
     'password' =>  'required|min:8',
    //'g-recaptcha-response' => 'required'

    ]);
    $email = $request->input('email');
    $login = $request->input('login');
    $password = bcrypt($request->input('password'));
    $user = new Utilisateur();
    $user->email = $email;
    $user->login = $login;
    $user->password = $password;
    $user->etat_act = 0;
    $user->etat_verif = 0;
    $user->name = $login;
    $user->remember_token = "";
    $user->etat_carte = 0;
    $user->verifyToken = Str::random(40);
    $user->save();
    DB::table('solde')->insert([
                    "id_user"=>$user->id_user,
                    "nbre_jeton"=>0,
                    ]);
    $thisUser = Utilisateur::findOrFail($user->getKey());
    $this->sendEmail($thisUser);
   return redirect('verifyEmailFirst');

  }
  public function postSignIn(Request $request){
       $this->validate($request,[
     'login' => 'required',
     'password' =>  'required'

    ]);
    $creds=array(
        'login' => $request->input('login'),
       'password' => $request->input('password')
    );
   if($request->input('remember')){
       if(Auth::attempt($creds,true)){

      return view('index')->with('creds',$creds);
   }
   else{
       return view('index');
   }
   }
   else{
           if(Auth::attempt($creds)){

      return view('index')->with('creds',$creds);
   }
   else{
       return view('index');
   }
   }


  }
  public function verifyEmail(){
      return view('verify-first');
  }
  public function sendEmail($thisUser){
      Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
  }
  public function sendEmailDone($email,$token){
    $verifyUser = Utilisateur::where('verifyToken', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->etat_verif) {
                $verifyUser->user->etat_verif = 1;
                $verifyUser->user->save();
                $status = "Votre Email est maintenant vérifié. Vous pouvez se Connecter.";


            }else{
                $status = "Votre Email est Déja  vérifié. Vous pouvez se Connecter.";
            }
        }else{
            return redirect('signin-failure');
        }

        //return redirect('signin-success')->with('status', $status);
        return redirect('signin-success');
  }
  public function getLogout(){
    Auth::logout();
    return redirect('index');
  }
  public function propoTrajet(){
     return view('proposer_trajet')->with('login',Auth::user()->login);
  }
  public function demTrajet(Request $request){
           $input = Input::all();
         $thread = Thread::create([
             'subject' => "Demande d'un trajet",
         ]);
            $login= Utilisateur::where('id_user',$request->input('i'))->get();
               $transact = new Transaction();
         $transact->id_dmd = Auth::id();
         $transact->id_trajet =  intval($request->input('j'));
         $transact->id_conduct = intval($request->input('i'));
         $transact->confirme = 0;
         $transact->save();
         $id_trns = Transaction::findOrFail($transact->getKey());
          $message  = new Message();
         $message->thread_id = $thread->id;
         $message->user_id = Auth::id();
         $message->body =  "je vous demande d'accepter le trajet";
         $message->type_mess = 1;
         $message->id_trns = $id_trns->id_trns;
         $message->save();
         // Sender
      /*   Participant::create([
             'thread_id' => $thread->id,
             'user_id' => Auth::id(),
             'last_read' => new Carbon,
         ]);*/
         $Participant =new Participant();
         $Participant->thread_id=$thread->id;
         $Participant->user_id=Auth::id();
         $Participant->last_read=new Carbon;
         $Participant->save();
         // Recipients

             $thread->addParticipant($login[0]->id_user);
         return response()->json($id_trns->id_trns);
   }

    public function actTrajet(Request $request){
          $input = Input::all();
          if(intval($request->input('d')) == 1){
            $dec = "Accepté";
          }
          else{
            $dec = "Refusé";
          }
          $thread = new Thread();
        $thread->subject = "Votre Demande de trajet est " . $dec;
        $thread->type_thread = 1;
        $thread->save();
        /*$thread = Thread::create([
            'subject' => "Votre Demande de trajet est " . $dec,
            'type_thread' => 1,
        ]);  */
           $login= Utilisateur::where('id_user',$request->input('i'))->get();
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'body' => "Entrez en conctact avec le proposeur pour specifier le point de depart merci",
            'type_mess' => 0,
        ]);
        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => Auth::id(),
            'last_read' => new Carbon,
        ]);
            $thread->addParticipant($login[0]->id_user);
        return response()->json($login[0]->id_user);
  }
  public function isVerified(Request $request){
      $etat = Utilisateur::where('id_user',Auth::id())->get();
      return response()->json($etat);
  }
  public function test(Request $request){
     $this->validate($request, [
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
if(Input::hasFile('photo')){
  $id_user = intval(Auth::id());
  $queries = Profils::where('id_user',$id_user)->first();
  dd($queries->nom);
$verifier= new verifier();
$verifier->id_user = $id_user;
$verifier->id_admin = 1;
$verifier->cin = Input::get('cin');

$file=Input::file('photo');
$name = $queries->nom.'-'.$queries->prenom.'.'.$file->getClientOriginalExtension();
$destinationPath = public_path('/uploadcin');
$file->move($destinationPath, $name);
$verifier->img_cin=$name;


$verifier->save();
}

  }

   public function submitTrajet(Request $request){
      $this->validate($request,[
     'd_dep' => 'required',
     't_dep' => 'required',
     'qDep' => 'required',
     'uDes' => 'required',
     'nbkm' =>  'required'

    ]);
    $des = $request->input('uDes');
    $src = $request->input('qDep');
    $date_pub = \Carbon\Carbon::now()->toDateTimeString();
    $date_dep = $request->input('d_dep')." ". $request->input('t_dep').":00";
    $nbrKM = $request->input('nbkm');
    $id_propo = Auth::id();
    $trajet = new Trajets();
    $trajet->des = $des;
    $trajet->src = $src;
    $trajet->id_proposeur = $id_propo;
    $trajet->date_pub = $date_pub;
   $trajet->date_dep = $date_dep;
   $trajet->nbrKM = $nbrKM;
   $trajet->save();
   $done = 1;
    return view('proposer_trajet')->with('done',$done);
  }
   public function list(Request $request){
    $term = $request->input('term');
    $result = array();
    $queries = Utilisateur::where('login','LIKE',"%{$term}%")
    ->select('login')->take(10)->get();
    foreach($queries as $query)
    {
        $result[] = ['value'=>$query->login];
    }
    return response()->json($result);
  }
}
?>
