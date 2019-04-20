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

<div class="col s10">
<div class = "row">

  <form class = "col s6">
  <h4 align="center">Fermeture du compte</h4>

  <div class="row">
      <div class="card-panel deep-orange lighten-5">
        <p class="grey-text " >Si vous souhaitez vraiment fermer votre compte, nous en sommes désolés. Afin que nous puissions continuer d'améliorer notre service,
        nous vous demandons simplement de nous donner la raison de votre décision
        </p>

    <div class = "row">
      <label>Quel raison !!</label>
        <select>
          <option value = "" disabled selected>Raison :</option>
          <option value = "1">Je n&#039;ai pas trouvé ce que je cherchais et préfère donc me désinscrire.</option>
          <option value = "2">Je reçois trop d&#039;appels ou d&#039;e-mails qui ne m&#039;intéressent pas.</option>
          <option value = "3">Je croyais vouloir faire du covoiturage, mais en fait ce n&#039;est pas mon truc !.</option>
          <option value = "4">J&#039;ai trouvé un covoiturage régulier, je n&#039;ai plus besoin du site, merci !.</option>
          <option value = "5">Aucun problème, le site est top.</option>
        </select>
    </div>

      <div class="row">
        <div class="input-field">
          <textarea id="desc" class="materialize-textarea"></textarea>
          <label for="desc">Description du problème</label>
        </div>
      </div>

    <div class = "row">
      <button class="btn deep-orange lighten-2" type="submit" name="submit">Fermer le compte
        <i class="material-icons right">send</i>
      </button>
    </div>

    </div>
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
