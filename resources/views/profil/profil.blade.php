
@extends('layouts.app')
@section('content')
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


<br>
<br>
<div class="row section">
<div class="col s2">

<li class="no-padding">
    <ul id="nav" class="collapsible collapsible-accordion">
        <li class="bold"><a href="profil" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Informations personnelles</font></a> </li>
        <li class="bold"><a href="preferences" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Préférences</a></font></li>
    <li class="bold"><a href="{{route('vehicule',[],true)}}" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Véhicule</a></font></li>
        <li class="bold"><a href="preferences" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">versements</a></font></li>
        <li class="bold"><a href="mdp" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">Mot de passe</a></font></li>
        <li class="bold"><a href="fermercompte" class="collapsible-header waves-effect waves-red" tabindex="0"><font color="#ff8a65">fermeture de compte</a></font></li>
    </ul>
</li>
</div>

 @if(isset($info))
<div class="col s10">
<form name="f1" method="post" enctype="multipart/form-data" action="{{route('updateProfil',[],true)}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col s8">

    <div class="row">
        <div class="input-field col s6">
            <input id="nom" type="text"  name= "nom" value="{{ucfirst($info['nom'])}}" class="validate">
            <label for="nom">Nom</label>
        </div>

        <div class="input-field col s6">
            <input id="prenom" type="text" name= "prenom" value="{{ucfirst($info['prenom'])}}" class="validate">
            <label for="prenom">Prénom</label>
        </div>
    </div>

    <div class="row">
        <div class = "input-field col s6">
            <input id = "email" type = "email" name= "email" value="{{$info['email']}}" class = "validate"> <label for = "email">Email</label>
        </div>

        <div class = "input-field col s6">
            <input id = "age" type = "number" name= "age" value="{{$info['age']}}" class = "validate"> <label for = "Age">Age</label>
        </div>
    </div>

    <div class="row">
        <div class = "input-field col s6">
            <input id = "Tel" type = "tel" name= "tel" value="{{$info['tel']}}" class = "validate"> <label for = "Tel">Téléphone</label>
        </div>

        <div class = "input-field col s6">
            <input id = "adr" type = "text" name= "adr" value="{{$info['adr']}}" class = "validate"> <label for = "adr">Addresse</label>
        </div>

    </div>

  <div class="row">
        <div class=" col s4">
            <input class="with-gap"  id = "Homme" type = "radio" name = "sexe" value = "Homme" @if($info['sexe'] == "Homme") checked @endif />
            <label for = "Homme">Homme</label>
        </div>

        <div class=" col s4">
            <input class="with-gap" id = "Femme" type = "radio" name = "sexe" value = "Femme"  @if($info['sexe'] == "Femme") checked @endif />
            <label for = "Femme">Femme</label>
        </div>

    </div>

    <div class="row">
        <div class = "input-field col s5">
            <input id = "univ" type = "text" name= "univ" value="{{$info['univ']}}" class = "validate"> <label for = "univ">Universite</label>

        </div>
    </div>

        <div class = "col s8 right">
                {{ csrf_field() }}
            <button class="btn deep-orange lighten-2" type="submit" name="submit">Enregister les informations
            <i class="material-icons right">send</i>
            </button>
        </div>

    </div>

    <div class="col s4 ">

        <center><img src = "uploadphoto/{{$info['photo']}}" alt = "" class = "circle responsive-img" width="60%" height="80%"></br></center>

     <!--   <input type="file" name="photo" > -->
     <form action="#">
        <div class="file-field input-field">
          <div class="btn #ffccbc deep-orange lighten-2">
            <span>Photos</span>
            <input type="file" name="photo">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="photo" value="{{$info['photo']}}">
          </div>
        </div>
      </form>

    <div class="col s12">
    </div>

</form>
</div>
@endif

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
</div>

<script>
    $("#univ").focus(function(){
       console.log("fdklgùfld");
       $("#univ").attr('value',"");
       $( "#univ" ).autocomplete({
   source: "rech_univ",
   messages: {
     noResults: '',
     results: function() {}
   },
   minLength: 3,
   select: function(event, ui) {
       console.log("enter");
       $('#univ').val(ui.item.value);
   }
   });
   });

   </script>
@endsection
