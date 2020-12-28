<?php

namespace App\Http\Controllers;

use App\PrivateMessage;
use Illuminate\Http\Request;

class PrivateMessageController extends Controller
{
    public function getUserNotifications()
    {
        $notifications = PrivateMessage::where('lue', 0)
               ->where('recep_id', Auth::id)
                ->orderBy('created_at', 'desc')->get();
        return response(['data'=> $notifications], 200);
    }
    public function getPrivateMessages()
    {
        $pms = PrivateMessage::where('recep_id', Auth::id)
                ->orderBy('created_at', 'desc')->get();
        return response(['data' => $pms], 200);
    }

    public function getPrivateMessageById(Request $request)
    {
        $pm =  PrivateMessage::where('id_mess', Auth::id)->first();
        if ($pm->lue == 0) {
        }
    }


    public function getPrivateMessageSent()
    {
    }

    public function sendPrivateMessage()
    {
    }
}
