@extends('layouts.app')
@section('content')
<div class="container section no-pad-bot">
<div class="row">
    <div class="col s12">
        <div class="col s2"></div>
        <div class="col s8">
                <div class="card small">
                  <div class="card-image">
                    <img src={{ asset('img/verifie.png') }} width = "80" height="90" alt="sample">
                  </div>
                  <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                  </div>
                </div>
              
            
        </div>
        <div class="col s2"></div>
      
    </div>
  </div>
</div>
@endsection