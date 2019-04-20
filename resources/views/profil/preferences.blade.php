@extends('layouts.app')
@section('content')
<style>

h1, h2, h3, h4, h5, h6{
	font-weight: 200;
	color: #ff7043;
}

h1{
	text-align: center;
	padding-bottom: 10px;
	border-bottom: 2px solid #ff8a65;
	max-width: 40%;
	margin: 20px auto;
}

/* CONTAINERS */

.container {max-width: 850px; width: 100%; margin: 0 auto;}
.four { width: 32.26%; max-width: 32.26%;}


/* COLUMNS */

.col {
  display: block;
  float:left;
  margin: 1% 0 1% 1.6%;
}

.col:first-of-type { margin-left: 0; }

/* CLEARFIX */

.cf:before,
.cf:after {
    content: " ";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    *zoom: 1;
}

/* FORM */

.form .plan input, .form .payment-plan input, .form .payment-type input{
	display: none;
}

.form label{
	position: relative;
	color: #fff;
	background-color: #aaa;
	font-size: 16px;
	text-align: center;
	height: 150px;
	line-height: 150px;
	display: block;
	cursor: pointer;
	border: 5px solid transparent;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
}

.form .plan input:checked + label, .form .payment-plan input:checked + label, .form .payment-type input:checked + label{
	border: 3px solid #ffab91;
	background-color: #ffab91;
}

.form .plan input:checked + label:after, form .payment-plan input:checked + label:after, .form .payment-type input:checked + label:after{
	content: "\2713";
	width: 40px;
	height: 40px;
	line-height: 40px;
	border-radius: 100%;
	border: 2px solid #ffab91;
	background-color: #ffab91;
	z-index: 999;
	position: absolute;
	top: -10px;
	right: -10px;
}

.submit{
	padding: 15px 60px;
	display: inline-block;
	border: none;
	margin: 20px 0;
	background-color: #ffab91;
	color: #fff;
	border: 0px solid #333;
	font-size: 18px;
	-webkit-transition: transform 0.3s ease-in-out;
	-o-transition: transform 0.3s ease-in-out;
	transition: transform 0.3s ease-in-out;
}

.submit:hover{
	cursor: pointer;
	transform: rotateX(360deg);
}
</style>
<br>
<br>
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
		<center><h3>Préférences</h3></center>
		<form class="form cf" method="post" action="{{route('updatePref',[],true)}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
			<section class="plan cf">
				<h3>Discussion</h3>
				<input type="radio" name="radio1" id="free" value="free" @if($info['discussion'] == "free") checked @endif/>
				<label class="free-label four col" for="free">Vous ne m'entendrez pas beaucoup.</label>
				<input type="radio" name="radio1" id="basic" value="basic" @if($info['discussion'] == "basic") checked @endif/>
				<label class="basic-label four col" for="basic">Je suis parfois d'humeur bavarde.</label>
				<input type="radio" name="radio1" id="premium" value="premium" @if($info['discussion'] == "premium") checked @endif/>
				<label class="premium-label four col" for="premium">J'aime bien discuter.</label>
			</section>

			<section class="payment-plan cf">
				<h3>Cigarette</h3>
				<input type="radio" name="radio2" id="freee" value="free" @if($info['cigarette'] == "free") checked @endif/>
				<label class="free-label four col" for="freee">La cigarette me dérange.</label>
				<input type="radio" name="radio2" id="basicc" value="basic" @if($info['cigarette'] == "basic") checked @endif/>
				<label class="basic-label four col" for="basicc">Ça dépend des jours.</label>
				<input type="radio" name="radio2" id="premiumm" value="premium" @if($info['cigarette'] == "premium") checked @endif/>
				<label class="premium-label four col" for="premiumm">La cigarette ne me dérange pas.</label>
			</section>

			<section class="payment-type cf">
				<h3>Musique</h3>
				<input type="radio" name="radio3" id="freea" value="free" @if($info['musique'] == "free") checked @endif/>
				<label class="free-label four col" for="freea">Je n'écoute pas de musique en voiture.</label>
				<input type="radio" name="radio3" id="basica" value="basic" @if($info['musique'] == "basic") checked @endif/>
				<label class="basic-label four col" for="basica">Des fois oui, des fois non.</label>
				<input type="radio" name="radio3" id="premiuma" value="premium" @if($info['musique'] == "premium") checked @endif/>
				<label class="premium-label four col" for="premiuma">J'aime bien écouter de la musique.</label>
			</section>

			{{ csrf_field() }}
			
			<input class="submit" type="submit" value="Submit">		
		</form>
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