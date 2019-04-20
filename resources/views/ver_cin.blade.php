@extends('layouts.app')
@section('content')
<?php
$id_user = intval(Auth::id());
$query = DB::table('verif')
        ->where('verif.id_user', '=',$id_user)
        ->first();
        if ($query === null) {
?>
<div class="float-right-area">
<div class="inner-right">
<div>
<br>
<div class="row">
<div class="col m12">
<div class="col m6">
<div class="float-left-area">
<div class="inner-left">
  <div class="container">
        <!-- Page Content goes here -->


 <form action="{{route('verification_account',[],true)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @if(count($errors)> 0)
     <div class="row">
      <div class="col s12 left-align">
          <ul class="collection">
       @foreach($errors->all() as $error)
         <li class="collection-item deep-orange lighten-1" style="color:white">{{$error}}</li>
       @endforeach
          </ul>
      </div>
     </div>
     @endif
          <label style="font-size:120%">Votre numéro C.I.N de votre carte d'identité</label>
          <div class="input-field">
<br> <input type="text" name="cin" id="cin" placeholder="CIN">
          </div><br><br><br>
          <label style="font-size:120%">Photo de votre carte d'identité</label><br>
<div class="file-field input-field">
  <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
      <div class="btn" style="background-color:#ff7043">
        <span>File</span >
        <input type="file" name="photo">
      </div>
      <div class="file-path-wrapper">
        <input  class="file-path validate" type="text" name="photo" >
      </div>
    </div>
    <br>

 <button class="btn waves-effect waves-light" type="submit"  value="upload" style="background-color:#00e676;width:100%">Verifier votre compte
    {{ csrf_field() }}
  </button><br><br><br>
 </form>
</div>
</div>
      </div>
    </div>
    <div class="card col m6">
       <div class="card-content">
         <center><img src="./img/ver.png" style="width:30%"></center><br>
         <span class="card-title activator grey-text text-darken-2">Confirmez votre identité sur la platforme CovoitLbahja</span>
         <br><br> <p>
           Avant que nous ne puissions examiner votre compte, veuillez entrer le numero de votre carte didentité accompagnier de ca photo pour nous aider à vérifier votre identité.<br>
           Veuillez ajouter en pièce jointe une copie de vos pièces d’identité.
         </p>
       </div>
     </div>
    </div></div>



</div>
</div>
<?php
}else{
?>
<div class="float-right-area">
<div class="inner-right">
<div>
<br>
<div class="row">
<div class="col m12">
<div class="col m2"></div>
    <div class="card col m8">
       <div class="card-content">
         <center><img src="/img/waiting.png" alt=""></center><br><br><br>
         <span class="card-title activator grey-text text-darken-2">Confirmation de votre identité en cours</span>
         <br><br> <p>
Votre identité est en coure de vérification,<br>la vérification peut prendre quelques heures, veuillez patienter..
</p>
       </div>
     </div>
  <div class="col m2"></div>
    </div></div>



</div>
</div>
<?php
}
 ?>
@endsection
