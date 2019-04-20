<!DOCTYPE html>
<html lang="fr">
<head>

<meta name="google-site-verification" content="7YPwsjlhzTM9xs9MzCGk7SuFfJt7IgKocgsbukrbFxc" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3943292891878675",
    enable_page_level_ads: true
  });
</script>
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <!--Import materialize.css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
           <style>
           #specolor {
               color : #ff7043;
           }
           #specolor:hover{
             -webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0), 0 0 0 0 rgba(0, 0, 0, 0);
             -moz-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0), 0 0 0 0 rgba(0, 0, 0, 0);
             box-shadow: 0 0 0 0 rgba(0, 0, 0, 0), 0 0 0 0 rgba(0, 0, 0);

           }
           .btn-custom{
       margin-top: 10px;
      width: 40%;
     border-radius: 100px;
       z-index: 0;
       color: white;
    font-weight: 500;
    }
    .modal {
  width: 30% !important;
  height: 130% !important;
  overflow:hidden;
}
.checkbox-orange[type="checkbox"] + label:before{
    border: 2px solid #ff7043;
    background: transparent;
}
.checkbox-orange[type="checkbox"]:checked + label:before{
    border: 2px solid transparent;
    border-bottom: 2px solid #ff7043;
    border-right: 2px solid #ff7043;
    background: transparent;
}
nav{
  height: 50px;
  line-height: 50px;
  background-color:#fff;
  color:#ff7043;
}
.font {
color: #ff7043;
}
.btn {
  flex: 1 1 auto;
  text-align: center;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  text-transform: none;
  border-radius: 50px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
 }
.btn:hover {
  background-position: right center; /* change the direction of the change here */
}
.btn-1 {
  background-image: linear-gradient(to right, #ff8a65  0%, #ffab91  51%, #ff8a65  100%);
}


       </style>



    <script>

    var loaded_dem=0,loaded=0;(function(a){a(function(){a('.button-collapse').sideNav(),a('.parallax').parallax(),a('select').material_select()})})(jQuery),$(document).ready(function(){$('.modal').modal()}),$(document).ready(function(){$('#remember').on('change',function(){$(this).is(':checked')&&console.log('Start is checked')})});function actTrajet(a,b,c){$.ajax({url:'act_trajet',type:'GET',data:{i:b,d:c,trns:a},dataType:'JSON',success:function(){$('#notif_mess').modal('open')},error:function(e,f,g){console.log('Error '+e.status+' | '+g)}})}function decPropo(a){if('y'===a)$.ajax({url:'isVerified',type:'GET',dataType:'json',success:function(b){if(console.log(),0==b[0].etat_carte){Materialize.toast('Pour Proposer un Trajet veuillez d\xE9poser votre carte nationale',3500,'deep-orange lighten-1')}else if(1==b[0].etat_act)window.location.href='{{route("proposer_trajet")}}';else{Materialize.toast('<i class="material-icons print">call_missed</i>'+'Pour Proposer un trajet veuillez remplir votre profil',3500,'deep-orange lighten-1')}},error:function(b,c,e){console.log('Error '+b.status+' | '+e)}});else{Materialize.toast('Pour Proposer un Trajet veuillez se Connecter'+'<i class="material-icons print">call_made</i>',3500,'deep-orange lighten-1')}}function messLoaded(){$.ajax({url:'load_messages',type:'GET',dataType:'JSON',success:function(a){if(0==loaded){for(var c,b=0;b<a.length;b++)if(c=a[b],0==c.type&&0==c.type_thread){var e=$('<li></li>').addClass('collection-item avatar'),f=$('<img width="38" height="38" style="margin-top:1%">').addClass('circle').attr('src','uploadcin/'+c.photo),g=$('<b></b>').addClass('email-title').text(c.subject+'  @'+c.login).css('color','#1b2836'),h=$('<p></p>').addClass('truncate speech ultra-small').text(c.body),k=$('<span style="margin-top:-3%"></span>').addClass(' white-text badge red').text(c.created);e.append(f).append(g).append(h).append(k),$('#mess .email-unread').append(e)}loaded=1}},error:function(a,b,c){console.log('Error '+a.status+' | '+c)}})}function messDemLoaded(){$.ajax({url:'load_messages',type:'GET',dataType:'JSON',success:function(a){if(0==loaded_dem){for(var c,b=0;b<a.length;b++)if(c=a[b],1==c.type){var e=$('<li></li>').addClass('collection-item avatar'),f=$('<img width="38" height="38" style="margin-top:1%">').addClass('circle').attr('src','uploadphoto/'+c.photo),g=$('<b></b>').addClass('email-title').text(c.subject+', par -> '+c.login).css('color','#1b2836'),h=$('<p></p>').addClass('truncate speech ultra-small').text(c.body),k=$('<a style="margin-top:5%" onclick="actTrajet('+c.id_trns+','+c.id_user+','+1+');">Accepter</a>').addClass('btn green accent-3 modal-trigger'),l=$('<a style="margin-top:5%" onclick="actTrajet('+c.id_trns+','+c.id_user+','+0+');">Refuser</a>').addClass('btn red modal-trigger'),m=$('<div></div>').addClass('row col s8'),n=$('<div></div>').addClass('row col s4');m.append(f).append(g).append(h),n.append(k).append(l),e.append(m).append(n),$('#dem_mess .email-unread').append(e)}else if(1==c.type_thread){var e=$('<li></li>').addClass('collection-item avatar'),f=$('<img width="38" height="38" style="margin-top:1%">').addClass('circle').attr('src','uploadphoto/'+c.photo),g=$('<b></b>').addClass('email-title').text(c.subject+'  @'+c.login).css('color','#1b2836'),h=$('<p></p>').addClass('truncate speech ultra-small').text(c.body),o=$('<span style="margin-top:-3%"></span>').addClass(' white-text badge red').text(c.created);e.append(f).append(g).append(h).append(o),$('#dem_mess .email-unread').append(e)}loaded_dem=1}},error:function(a,b,c){console.log('Error '+a.status+' | '+c)}})}function demTrajet(a,b){$.ajax({url:'dem_trajet',type:'GET',data:{i:a,j:b},dataType:'JSON',success:function(c){trns_id=c,console.log(c),$('#notif_dem').modal('open')},error:function(c,e,f){console.log('Error '+c.status+' | '+f)}})}function decDemande(a,b,c){if('y'===a+'')$.ajax({url:'isVerified',type:'GET',dataType:'json',success:function(e){if(1==e[0].etat_act)demTrajet(b,c);else{Materialize.toast('Pour Demander un trajet veuillez remplir votre profil'+'<i class="material-icons print">call_made</i>',3500,'deep-orange lighten-1')}},error:function(e,f,g){console.log('Error '+e.status+' | '+g)}});else{console.log(b);Materialize.toast('Pour Demander un Trajet veuillez se Connecter ou Inscrire'+'<i class="material-icons print">call_made</i>',3500,'deep-orange lighten-1')}}
        </script>
<title>CovoitLbahja</title>
</head>
<body>
  <div id="dem_mess" class="modal" style="background-color: #1b2836;width: 75% !important ; height: 75% !important ;">
      <div class="modal modal-fixed-footer" style="background-color: #1b2836;">
                <center><a href="#!" class="white-text">Notifications</a></center>
        </div>
     <div class="modal-content">
             <div class="row cnt ">
              <ul class="collection  email-unread" >
              </ul>
            </div>
          </div>
    </div>
  <div id="notif_dem" class="modal" style="width: 75% !important ; height: 75% !important ;">
<div class="modal-content">
<h4>Notification</h4>
<p>Um message de demande de trajet est envoyé au proposeur pour accepter ou refuser lorsque une decision est prise vous serez notifier par message .</p>
</div>
</div>
           <div class="navbar-fixed">
            <nav id="main_menu">
            <div class="nav-wrapper ">
            <a href="{{route('index')}}" ><img class = "brand-logo" src={{ asset('img/logo_covoit.png') }} alt="" height = "50"></a>
         <!-- <a href="#" data-activates="mobile-demo" class="menu-sidebar-collapse"><i class="material-icons" style="color:#ff7043">menu</i></a> -->
                    <ul class="right hide-on-med-and-down" id="nav-mobile">
                      <li><a href="verification" id="stats" name="stats"></a></li>
<li><a  onclick="@if(Auth::user()) decPropo('y'); @else decPropo('n'); @endif"  class = "plink btn btn-1">Proposer un Trajet</a></li>
                    @if(Auth::user())
<li><a href="#dem_mess" onclick="messDemLoaded();" class="modal-trigger" id = "specolor" style="padding-top:-15%"><label class="material-icons "  style="color:#000">notifications_active</label></a></li>

                    <li><a href="#mess" onclick=" messLoaded();" class="modal-trigger" id = "specolor" style="padding-top:-15%"><label class="material-icons"  style="color:#000">mail</label> @include('unread-count') </a></li>
                    @endif
                <li><a href="inscription" class = "ilink" id = "specolor">@if(Auth::user()) @else Inscription @endif </a></li>
                <li>@if(Auth::user())<a href="profil" style="color:#000"><label class="material-icons" style="padding-top:35%;color:#000">person</label></a>@else @endif</li>
                 <li><a href="{{route("logout")}}" style="color:#000" id = "specolor">@if(Auth::user()) <label class="material-icons" style="padding-top:35%;color:#000">power_settings_new</label> @endif </a></li>
                 <li><a href="#login-page"  class = "clink modal-trigger" id = "specolor"> <?php if(Auth::user()){?><script>$(this).hide();</script><?php }else{?> Connexion <?php } ?></a></li>



@if(Auth::user())
                   <li><label class="material-icons" style="padding-top:50%">more_vert</label></li>
                   <li><a><label style="font-size:100%;padding-top:50%;color:#ff8a65" id="jetons" name="jetons"></label></a></li>
                   <li><label class="material-icons" style="padding-top:50%;color:#ff8a65">monetization_on</label></li>
                   @endif
<script type="text/javascript">
$( document ).ready(function() {
var iir="@if(Auth::user()){{ucfirst(Auth::user()->id_user)}} @endif";
$('#jetons').load("nbr_jetons?usr="+iir);
$('#stats').load("etatv?usr="+iir);
});

$(".button-collapse").sideNav();

$('body').on('click', '.button-collapse', function() {
    window.alert('too bad :(. This event will never be triggered because the sideNav is stopping propagation.');
});
</script>
                    </ul>

                </div>

            </nav>

</div>
        <!-- Move the sidenav outside of .navbar-fixed -->
         <ul class="side-nav" id="mobile-demo">
                      <li><a href="verification" id="stats" name="stats"></a></li>
<li><a  onclick="@if(Auth::user()) decPropo('y'); @else decPropo('n'); @endif"  class = "plink btn btn-1">Proposer un Trajet</a></li>

                    @if(Auth::user())


<li><a href="#dem_mess" onclick="messDemLoaded();" class="modal-trigger" id = "specolor" style="padding-top:-15%"><label class="material-icons "  style="color:#000">notifications_active</label></a></li>

                    <li><a href="#mess" onclick=" messLoaded();" class="modal-trigger" id = "specolor" style="padding-top:-15%"><label class="material-icons"  style="color:#000">mail</label> @include('unread-count') </a></li>
                    @endif
                <li><a href="inscription" class = "ilink" id = "specolor">@if(Auth::user()) @else Inscription @endif </a></li>
                <li>@if(Auth::user())<a href="profil" style="color:#000"><label class="material-icons" style="padding-top:35%;color:#000">person</label></a>@else @endif</li>
                 <li><a href="{{route("logout")}}" style="color:#000" id = "specolor">@if(Auth::user()) <label class="material-icons" style="padding-top:35%;color:#000">power_settings_new</label> @endif </a></li>
                 <li><a href="#login-page"  class = "clink modal-trigger" id = "specolor"> <?php if(Auth::user()){?><script>$(this).hide();</script><?php }else{?> Connexion <?php } ?></a></li>



@if(Auth::user())
                   <li><label class="material-icons" style="padding-top:50%">more_vert</label></li>
                   <li><a><label style="font-size:100%;padding-top:50%;color:#ff8a65" id="jetons" name="jetons"></label></a></li>
                   <li><label class="material-icons" style="padding-top:50%;color:#ff8a65">monetization_on</label></li>
                   @endif

         </ul>


           <div id="mess" class="modal" style="background-color: #1b2836;;width: 75% !important">
               <div class="modal-footer" style="background-color: #1b2836;">
            <a  href="{{route("messages.create")}}" id="new-mess" class = "plink btn btn-1 btn-floating btn-large waves-effect waves-light"><i class="material-icons">send</i></a>

                 </div>
              <div class="modal-content">
                      <div class="row cnt">
                       <ul class="collection  email-unread" id="frmmsg">
                       </ul>
                     </div>
                   </div>
             </div>

     <div id="login-page" class="modal">
        <div class="modal-content">
        <center><img src="{{asset('img/login.png')}}" style="width:40%"></center>
       <form action = "{{route('signin',[],true)}}" method="POST">
                    @csrf

                  <div class="row">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">account_circle</i>
                      <input id="login"  name = "login" type="text">
                      <label for="login" class="center-align">Login</label>
                    </div>
                  </div>
                  <div class="row" style="margin-top:-20%">
                    <div class="input-field col s12">
                      <i class="material-icons prefix">lock_outline</i>
                      <input id="password"  name = "password" type="password">
                      <label for="password">Mot de Passe</label>
                    </div>
                  </div>
                  <div class="row" hidden>
                    <p>
                          <input type="checkbox" id="remember-me"  name="remember" class="checkbox-orange"/>
                          <label for="remember-me">Souvenez de moi</label>
                      </p>
                    </div>
                  <div class="row" style="margin-top:-50%">
                      <div class="input-field col s12" align="center">
                           {{ csrf_field() }}
                 <button style="width:100%" class = "btn waves-effect waves-light btn-custom deep-orange lighten-1" type = "submit" class="validate">Connexion</button>
                <input type="hidden" name="_token" value = "{{Session::token()}}">
                <a style="width:100%" href="inscription" class="btn  btn-custom waves-effect btn-flat btn-small deep-orange lighten-3">Inscription</a>

               </div>
               </div>
       </form>
       </div>

     </div>
            @yield('content')
<footer class="page-footer" style="background-color:#ff8a65">
<style media="screen">
.contact_footer{
color:#ffccbc;
}
</style>
<div class="container">
<div class="row">
<!--********************************************** Footer Line 1 ******************************-->
<div class="col s12">

<div class="col s4">
<h5 style="color:#ffb6a0">Informations</h5>
<ul>
<li><a class="grey-text text-lighten-3" href="plus_info">Qui somme-nous</a></li>
<li><a class="grey-text text-lighten-3" href="#!">Se connecter</a></li>
<li><a class="grey-text text-lighten-3" href="#!">Inscription</a></li>
<li><a class="grey-text text-lighten-3" href="#!">Abonnement</a></li>
</ul>
</div>
<!--***************************************-->
<div class="col s4">
<center><h5 style="color:#ffb6a0">Contacts</h5></center>
<div class="col s12">
<div class="col s4"><center><i class="material-icons contact_footer">email</i></center></div>
<div class="col s8">nf@ovoitlbehja.com</div><br><br>
</div>
<div class="col s12">
<div class="col s4"><center><i class="material-icons contact_footer">phone</i></center></div>
<div class="col s8">+21264239872</div><br><br>
</div>
<div class="col s12">
<div class="col s4"><center><i class="material-icons contact_footer">location_on</i></center></div>
<div class="col s8">4000, Marrakech Maroc</div>
</div>
</div>
<!--***************************************-->
<div class="col s4">
             <center><h5 style="color:#ffb6a0">Modes de paiement</h5><br>
             <img src="{{ asset('/img/wc.png') }}" style="width:30%">
             <img src="{{ asset('/img/wu.png') }}" style="width:30%">
             <img src="{{ asset('/img/cm.png') }}" style="width:30%"><br>
             <img src="{{ asset('/img/mc.png') }}" style="width:30%">
             <img src="{{ asset('/img/me.png') }}" style="width:30%">
             <img src="{{ asset('/img/pp.png') }}" style="width:30%">
             </center>
</div>
<!--********************************************** Footer Line 2 ******************************-->
<div class="col s12"><br><br>
             <center>
             <a class="waves-effect waves-light btn-floating btn-small " style="background-color:#3b5998"><center><img src="{{ asset('/img/facebook.png') }}" style="width:70%;padding-top:15%"></center></a>
             <a class="waves-effect waves-light btn-floating btn-small " style="background-color:#83c3f3"><center><img src="{{ asset('/img/twitter.png') }}" style="width:70%;padding-top:15%"></center></a>
             <a class="waves-effect waves-light btn-floating btn-small " style="background-color:#dd4b39"><center><img src="{{ asset('/img/google-plus.png') }}" style="width:70%;padding-top:15%"></center></a>
             <a class="waves-effect waves-light btn-floating btn-small " style="background-color:#6d83ec"><center><img src="{{ asset('/img/instagram.png') }}" style="width:70%;padding-top:15%"></center></a>
            </center>
</div>
</div>
</div>
</div>
<!--********************************************** Footer Line 3 ******************************-->
         <div class="footer-copyright">
           <div class="container">
           <center>© 2018 CovoitLbehja - All rights reserved</center>
         </div>
         </div>
              </footer>


<script>
    (function($){$(function(){
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    $('select').material_select();
    //$('.modal-trigger').leanModal();
    });})(jQuery);
</script>
</body>
</html>
