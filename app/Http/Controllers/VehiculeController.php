<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicule;
use App\Utilisateur;
use Illuminate\Support\Facades\Auth;

class VehiculeController extends Controller
{
    //

    public function infovehicule()
    {

       $id_user = Auth::id();
       $info = array();
       $queries = Vehicule::where('id_user',$id_user)->get();
       
        foreach($queries as $query){
                                

 $info[] = ['type'=>$query->type,'couleur'=>$query->couleur,'matricule'=>$query->matricule,'photo'=>$query->photo];
        }
      // dd($info);
       return view("profil.vehicule")->with('info',$info[0]);
    }

    public function updatevehicule(Request $request){

        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploadvehicule');
            $image->move($destinationPath, $name);
    
        $id_user = intval(Auth::id()); 
        $id_vehicule = Vehicule::where('id_user',$id_user)
        ->select('id_vehicule')->get();
        $id_vehicule = intval($id_vehicule[0]['id_vehicule']);
        $vehicule = Vehicule::where('id_vehicule',$id_vehicule)->first();   // objet model
        $vehicule->type = $request->input('type');
        $vehicule->matricule = $request->input('matr');
        $vehicule->couleur = $request->input('color');
        $vehicule->photo = $name;

        
        $vehicule->save();  // insertion dee donnes
        
        return redirect('vehicule');
    }
}
