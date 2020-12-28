<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\preferences;
use App\Utilisateur;
use Illuminate\Support\Facades\Auth;

class PrefController extends Controller
{
    //

    public function infoPref()
    {
        $id_user = Auth::id();
        $info = array();
        $queries = preferences::where('id_user', $id_user)->get();
        foreach ($queries as $query) {
            $info[] = ['discussion'=>$query->discussion,'cigarette'=>$query->cigarette,'musique'=>$query->musique];
        }
        return view("profil.preferences")->with('info', $info[0]);
    }

    public function updatePref(Request $request)
    {
        $id_user = intval(Auth::id());
        $id_pref = preferences::where('id_user', $id_user)
        ->select('id_preference')->get();
        $id_pref = intval($id_pref[0]['id_preference']);
        $preferences = preferences::where('id_preference', $id_pref)->first();   // objet model
        $preferences->discussion = $request->input('radio1');
        $preferences->cigarette = $request->input('radio2');
        $preferences->musique = $request->input('radio3');
        $preferences->id_user = $id_user;
        $preferences->save();  // insertion dee donnes

        return redirect('preferences');
    }
}
