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

  <div class="col s8" >

<div class = "center row">
  <form class = "col s4" method="post" enctype="multipart/form-data" action="{{route('updatevehicule',[],true)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  <h3 class="center-align">Votre Véhicule</h3>
    <div class = "center row">
      <label>Sélectionner le Type</label>
        <select name="type">
          <option value = "{{ucfirst($info['type'])}}">{{ucfirst($info['type'])}}</option>
          <option value = "Voiture">Voiture</option>
          <option value = "Grand Moto">Grand Moto</option>
          <option value = "Moto">Moto</option>
        </select>         
    </div>

    <div class="row">
      <div class="input-field ">
          <input placeholder="Placeholder" id="matr" type="text" name="matr" class="validate" value="{{ucfirst($info['matricule'])}}">
          <label for="matr">mmatriculation</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field ">
          <input placeholder="Placeholder" id="color" type="text" name="color" class="validate" value="{{ucfirst($info['couleur'])}}">
          <label for="color">couleur</label>
      </div>
    </div>
    
    <div class="row">  
    <img src = "uploadvehicule/{{$info['photo']}}" alt = "" class = "responsive-img" width="320" height="400"></br>
        <div class = "file-field input-field">
            <div class = "btn #ffccbc deep-orange lighten-2">
                <span>Browse</span>
                <input type = "file" name="photo"/>
            </div>
  
            <div class = "file-path-wrapper">
                <input class = "file-path validate" type = "text" name="photo" placeholder = "Upload file"  value="{{$info['photo']}}"/>
            </div>
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
