<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profils;
use App\Utilisateur;
use App\Universite;
use App\preferences;
use App\Vehicule;
use App\Verifier;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfilController;

class ProfilController extends Controller
{

  public function index()
  {
      return view('Verifier');
  }

  public function isFilled(){
      $empty = 0;
            $profil = Profils::where('id_user',Auth::id())->get();
       if($profil[0]->nom == null){
             $empty = 1;
         }
         elseif($profil[0]->prenom == null){
           $empty = 1;
         }
         elseif($profil[0]->email == null)
             $empty = 1;
        elseif($profil[0]->adr == null)
           $empty = 1;
         elseif($profil[0]->tel == null)
             $empty = 1;
         elseif($profil[0]->age == null)
               $empty = 1;
          elseif($profil[0]->photo == null)
             $empty = 1;
          elseif($profil[0]->univ == null)
           $empty = 1;
          elseif($profil[0]->sexe == null)
           $empty = 1;
          else {
               $empty = 0;
          }
      return $empty;
  }
    public function infoPerso()
    {

       $id_user = Auth::id();
       $info = array();
       $queries = Profils::where('id_user',$id_user)->get();

       if ($queries->count()) {

        $email = Utilisateur::where('id_user',$id_user)
        ->select('email')->get();
        $email = $email[0]['email'];

foreach($queries as $query){

$univ = Universite::where('id_univ',$query->univ)
->select('nom')->get();
$univ = $univ[0]['nom'];
$info[] = ['nom'=>$query->nom,'prenom'=>$query->prenom,'adr'=>$query->adr,
'tel'=>$query->tel,'age'=>$query->age,'photo'=>$query->photo,'email'=>$email,'sexe'=> $query->sexe,'univ' => $univ];
}
// dd($info);
return view("profil.profil")->with('info',$info[0]);
    }
    else{

        $id_user = intval(Auth::id());

        $profil = new Profils();   // objet model
        $profil->nom = "  ";  // lecture des donnes
        $profil->prenom = "  ";
        $profil->adr = "  ";
        $profil->tel = "  ";
        $profil->email = "  ";
        $profil->age = 0;
        $profil->photo = "  ";
        $profil->univ = 1;
        $profil->id_user = $id_user;
        $profil->sexe = "  ";
        $profil->save();

        $preferences= new preferences();
        $preferences->discussion = "free";
        $preferences->cigarette = "free";
        $preferences->musique = "free";
        $preferences->id_user = $id_user;
        $preferences->save();

        $vehicule = new Vehicule();
        $vehicule->type = "MOTO";
        $vehicule->matricule = "  ";
        $vehicule->couleur = "  ";
        $vehicule->photo = "  ";
        $vehicule->id_user = $id_user;
        $vehicule->save();

        return redirect('profil');

    }

    }

/*
    public function createprofil(Request $request){

        if ($request->hasfile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploadphoto');
            $image->move($destinationPath, $name);
            }

            $id_user = intval(Auth::id());

            $profil = new Profils();   // objet model
            $profil->nom = $request->input('nom');  // lecture des donnes
            $profil->prenom = $request->input('prenom');
            $profil->adr = $request->input('adr');
            $profil->tel = $request->input('tel');
            $profil->email = $request->input('email');
            $profil->age = intval($request->input('age'));
            $profil->id_user = $id_user;

            if ($request->hasfile('photo')){
                $profil->photo = $name;
            }
            else{
                $profil->photo = $request->input('photo');
            }

         $profil->univ = 8;

            $profil->sexe = $request->input('sexe');
            $profil->save();  // insertion dee donnes

            return redirect('profil');

    }
*/



    public function updateProfil(Request $request){

        if ($request->hasfile('photo')) {
        $image = $request->file('photo');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploadphoto');
        $image->move($destinationPath, $name);
        }

        $id_user = intval(Auth::id());
        $id_profil = Profils::where('id_user',$id_user)->select('id_profil')->get();
        $id_profil = intval($id_profil[0]['id_profil']);
        $profil = Profils::where('id_profil',$id_profil)->first();   // objet model
        $profil->nom = $request->input('nom');  // lecture des donnes
        $profil->prenom = $request->input('prenom');
        $profil->adr = $request->input('adr');
        $profil->tel = $request->input('tel');
        $profil->email = $request->input('email');
        $profil->age = intval($request->input('age'));
        $profil->id_user = $id_user;

        if ($request->hasfile('photo')){
            $profil->photo = $name;
        }
        else{
            $profil->photo = $request->input('photo');
        }
        $iduni = Universite::where('nom',$request->input('univ'))
        ->select('id_univ')->get();
     $profil->univ =intval($iduni[0]['id_univ']);
        $profil->sexe = $request->input('sexe');
        $profil->save();  // insertion dee donnes
        if(ProfilController::isFilled() == 0){
          $user = Utilisateur::where('id_user',Auth::id())->first();
          $user->etat_act = 1;
          $user->save();
        }
        else{
           $user = Utilisateur::where('id_user',Auth::id())->first();
          $user->etat_act = 0;
          $user->save();
        }
        return redirect('profil');
    }
}
