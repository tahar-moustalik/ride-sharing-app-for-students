@extends('layouts.app')
@section('content')
      <script>
         $(document).ready(function() {
            $('select').material_select();
         });
      </script>
<style type="text/css">

/* label color */
.input-field label {
   color: #ff8a65
 }
 /* label focus color */
 .input-field input[type=text]:focus + label {
   color: #ff8a65;
 }
 /* label underline focus color */
 .input-field input[type=text]:focus {
   border-bottom: 1px solid #ff8a65;
   box-shadow: 0 1px 0 0 #ff8a65;
 }
 /* valid color */
 .input-field input[type=text].valid {
   border-bottom: 1px solid #ff8a65;
   box-shadow: 0 1px 0 0 #ff8a65;
 }
 /* invalid color */
 .input-field input[type=text].invalid {
   border-bottom: 1px solid #ff8a65;
   box-shadow: 0 1px 0 0 #ff8a65;
 }
 /* icon prefix focus color */
 .input-field .prefix.active {
   color: #ff8a65;
 }
 .with-gap .active{
  color: #ff8a65;
 }

#container {
margin: 20px;
width: 200px;
height: 200px;
position: relative;
}

</style>
<body>


<div class="row">
<div class="col s2">

<li class="no-padding">
    <ul id="nav" class="collapsible collapsible-accordion">
        <li class="bold"><a href="profil" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Informations personnelles</font></a> </li>
        <li class="bold"><a href="preferences" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Préférences</a></font></li>
        <li class="bold"><a href="vehicule" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Véhicule</a></font></li>
        <li class="bold"><a href="preferences" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">versements</a></font></li>
        <li class="bold"><a href="mdp" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Mot de passe</a></font></li>
        <li class="bold"><a href="fermercompte" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">fermeture de compte</a></font></li>
    </ul>
</li>
</div>

<div class="col s10">
<div class = "row">
  <form class = "col s4"  method="post" enctype="multipart/form-data" action="{{route('passwordchange',[],true)}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h4 align="center">chengemment du mot de passe</h4>

    <div class="row">
      <div class="input-field ">
          <input placeholder="Placeholder" id="oldmdp" type="text" name"oldpass" class="validate">
          <label for="oldmdp">Anncien mot de passe</label>
      </div>

    </div>

    <div class="row">
      <div class="input-field ">
          <input placeholder="Placeholder" id="newmdp" type="text" name="newpass" class="validate">
          <label for="newmdp">nouveau mot de passe</label>
      </div>
    </div>

    <div class="row">
      <div class="input-field ">
          <input placeholder="Placeholder" id="newmdp2" type="text" name="confpass" class="validate">
          <label for="newmdp2">confirmer le mot de passe</label>
      </div>
    </div>

    <div class = "row center">
        {{ csrf_field() }}
      <button class="btn deep-orange lighten-2" type="submit" name="submit">Enregister les informations
        <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
</div>
</div>

<div class="fixed-action-btn horizontal click-to-toggle">
  <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
  </a>
  <ul>
      <li>
          <a class="waves-effect waves-light btn-floating social pinterest"><i class="fa fa-pinterest"></i></a>
      </li>
      <li>
          <a class="waves-effect waves-light btn-floating facebook"><i class="fa fa-facebook"></i></a>
      </li>
      <li>
          <a class="waves-effect waves-light btn-floating github"><i class="fa fa-github"></i></a>
      </li>
  </ul>
</div>

@endsection
