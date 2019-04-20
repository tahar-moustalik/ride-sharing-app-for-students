
@extends('layouts.app')
@section('content')
<div class="row center-align">
    <div class="col s12 m6">
      <div class="card deep-orange lighten-1">
        <div class="card-content white-text">
          <span class="card-title center-align">Echec de Vérification Email</span>
          <p>La vérification de votre email est résolue d'un échec , par contre 
              vous pouvez essayer de se reconnecter ou d'inscrir avec un autre email
          </p>
        </div>
        <div class="card-action white-text">
        <a href="inscription">Inscription</a>
          <a href="#login-page">Connexion</a>
        </div>
      </div>
    </div>
  </div>

@endsection