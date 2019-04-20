
@extends('layouts.app')
@section('content')
<style>
    .color_text{
  color : #13515b;
}
</style>
<!--<script src="js/script.js"></script> -->
<script>
$(".plink").remove(),$(".ilink").remove(),$(".clink").remove(),$(document).ready(function(){$(".datepicker").pickadate({closeOnSelect:!0,format:"dd/mm/yyyy"})}),$("i").addclass("deep-orange lighten-1;");

</script>
<div class="container section">
        <div class="row">
                <div class="col  s12 right-align">
                    <h5 class = "color_text">Déjà Membre ?</h5>
                    <a class="waves-effect waves-light btn deep-orange lighten-1">Connectez-vous</a>

                </div>

            </div>
</div>
<div class="section no-pad-bot">
  <div class="container">
     <h5 class = "color_text center-align">Pas encore membre ? Inscrivez-vous gratuitement</h5>
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
    <div class="card-panel">
        <h4 class= "header2 color_text">Remplir les Informations</h4>
        <div class="row">
        <form action="{{route('signup',[],true)}}"  id = "formValidate" class="col s12 " method="POST">
                @csrf
            <!--<input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
             <div class="row">
                 <div class="input-field col s12">
                 <input type="text" name = "login" class="validate" required value="{{Request::old('login')}}">
                  <label for="login">Login</label>
                 </div>
             </div>

             <div class="row">
                    <div class="input-field col s12">
                            <input type="email" required name = "email" value="{{Request::old('email')}}">
                            <label for="email">Email</label>
                           </div>
             </div>
             <div class="row">
                    <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name = "password" required{{Request::old('password')}}>
                            <label for="password">Mot de passee </label>
                           </div>
                           <h6 id="verify" style=  "color : green"  align = "right"></h6>
             </div>

                <div class="row">
          <div class="input-field col s12">
            <div class="g-recaptcha" data-sitekey="6Ld6pF4UAAAAAHnMANXta74NLxCSRBZW8TNQuBOT"></div>
        </div>
             <div class="row">
                    <div class="input-field col s12">
                         {{ csrf_field() }}
               <button class = "btn deep-orange lighten-1  waves-effect waves-light right" type = "submit" class="validate">
                   Envoyer
               </button>

             </div>
             </div>
            </form>
    </div>
</div>
</div>
</div>



@endsection
