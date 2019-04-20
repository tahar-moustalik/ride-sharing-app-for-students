<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trajets;
use App\Profils;
use App\Utilisateur;
use App\preferences;
class TrajetController extends Controller
{
      public function search(Request $request){

        $qDep = $request->input('qDep');
        $uDes = $request->input('uDes');
        $d_dep = $request->input('d_dep');
    $trajets = array();
    $queries = Trajets::where('src',"LIKE","{$qDep}%")
             ->where('des',"LIKE","{$uDes}%")
             ->whereDate('date_dep',"LIKE","{$d_dep}%")
             ->get();

    foreach($queries as $query)
    {
        $usr_log = Utilisateur::where('id_user',"{$query->id_proposeur}")->select('login')->get();

      $pr = Profils::where('id_user',"{$query->id_proposeur}")
          ->select('photo')->get();
          $preferences = preferences::where('id_user',"{$query->id_proposeur}")
                ->get();

       $pr = $pr[0]['photo'];
        $trajets[] = ['id_trajet'=>$query->id_trajet,'id_propo' => $query->id_proposeur,
        'des'=>$query->des,'src'=>$query->src,'login'=>$usr_log[0],'date_dep'=>$query->date_dep,'date_pub'=>$query->date_pub,'nbkm'=>$query->nbrKM,'pr'=> $pr,'dis'=>$preferences,'id_tr'=>$query->id_trajet,'id_pro'=>$query->id_proposeur];
    }
 //dd($trajets);
   return response()->json($trajets);
  }
}
