<?php
/*
arrow_forward

<p>
  <label>
    <input name="group1" type="radio" disabled="disabled" />
    <span>Brown</span>
  </label>
</p>
*/
use App\Profils;
//use App\verifier;
use App\Trajets;
$id_user = intval(Auth::id());

$tran = DB::table('transact')
    ->where('id_conduct', $id_user)
    ->first();


$trajet = Trajets::where('id_trajet',$tran->id_trajet)->first();


$Profil = Profils::where('id_user',$tran->id_dmd)->first();
echo $Profil->nom.'<br>';
echo $Profil->photo.'<br>';


echo $trajet->des.'<br>';
echo $trajet->src.'<br>';
echo $trajet->nbrKM.'<br>';


 ?>
 <!--
   <div class="col s12">
  <div class="col s2"></div>
 <div class="col s8">
   <div class="card horizontal">
     <div class="card-image">
<img src="/uploadcin/Ibrghoutn-Hamza.jpeg">
     </div>
     <div class="card-stacked">
       <div class="card-content">
         <p>I am a very simple card. I am good at containing small bits of information.</p>
       </div>
     </div>
   </div>
 </div>
  <div class="col s2"></div>
</div>
-->
