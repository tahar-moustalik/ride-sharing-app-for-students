
@extends('layouts.app')

@section('content')
@include('partials.flash')

  @if(isset($threads))
@each('partials.thread', $threads, 'thread', 'partials.no-threads')
@endif
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmNizz-HWH1_deJlvn2HvzgNHGOP4UrvQ" async defer></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>-->
      <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
 var map,directionsService,directionsDisplay,pageSize=3,trajets=[],markers=[];function initMap(){var e={zoom:12,center:{lat:31.6336545,lng:-8.008899},mapTypeId:google.maps.MapTypeId.ROADMAP};map=new google.maps.Map(document.getElementById("map"),e)}function Geocode(e,a){axios.get("https://maps.googleapis.com/maps/api/geocode/json",{params:{address:e,key:"AIzaSyAmNizz-HWH1_deJlvn2HvzgNHGOP4UrvQ"}}).then(function(e){console.log(e);var a=e.data.results[0].geometry.location.lat,t=e.data.results[0].geometry.location.lng;console.log(a+""+t),dispMarker(a,t,map)}).catch(function(e){console.log(e)})}function dispMarker(e,a,t,n){var o=new google.maps.Marker({position:{lat:parseFloat(e),lng:parseFloat(a)},map:t});markers.push(o)}function setMapOnAll(e){for(var a=0;a<markers.length;a++)markers[a].setMap(e)}function clearMarkers(){setMapOnAll(null)}function deleteMarkers(){clearMarkers(),markers=[]}function calculateAndDisplayRoute(e,t,a,n){e.route({origin:a,destination:n,travelMode:"DRIVING"},function(e,a){"OK"===a?t.setDirections(e):window.alert("Directions request failed due to "+a)})}showPage=function(a){$(".line-content").hide(),$(".line-content").each(function(e){pageSize*(a-1)<=e&&e<pageSize*a&&$(this).show()})},$("#pagin li a").click(function(){$("#pagin li a").removeClass("current"),$(this).addClass("current"),showPage(parseInt($(this).text()))});

</script>
<style>
  .current {
  color: green;
}

#pagin li {
  display: inline-block;
}
  #map{
    height:500px;
    width: 50%;
  }
.ui-autocomplete{
  z-index: 50;
  background-color: #ff7043;
  color: white;

}
.first {
margin-top:-5%;
padding-top:70px;
height:100vh;
min-height:400px;
background-size:cover;
background-size: 100%;
background-repeat: no-repeat;
}
.parallax {
    /* The image used */
    background-image: url("./img/home.jpg");
margin-top:-5%;
    /* Set a specific height */
min-height: 550px;
    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.input-group {
    display: table;
}

.input-group input, .suffix {
    display: table-cell;
}

.suffix {
    width:1%;
}
.bg-card-user {
	background: rgba(198,78,27,.8);
	padding: 15px 0;
  border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;
}
.truncate >img {
	width: 120px;
}

</style>
<body>

<div class="parallax">

  <div class="row">
    <div class="col s12 m4 l1"></div>
    <div id="cnt" class="col s12 m4 l10"><br><br><br><br><br><br><br><br><br><br><br><br>
<center>
        		<div class="offset-m4 offset-s2 center">
        			<h4 class="truncate bg-card-user">
                <form  id = "search" class = "col s12 " action="" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">

                 <div class="input-field col s3" style="margin-top:2%">
                     <input id="qDep"  name = "qDep" type="text"  class="validate" style="margin-left:5%;background-color:#fff;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">
                     <label for="qDep" style="margin-top:-2%;margin-left:5%">Quartier départ</label>
                  </div>

                   <div class="input-field col s3" style="margin-top:2%">
                     <input id="uDes" type="text"  name = "uDes" class="validate" style="background-color:#fff;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">
                     <label for="uDes" style="margin-top:-2%;margin-left:5%">Universite de destination</label>
                   </div>
                   <div class="input-field col s3" style="margin-top:2%">
                         <input type="text" class="datepicker" id="d_dep" name="d_dep" style="text-align: center;margin-top:-2%;margin-left:5%;background-color:#fff;border-radius: 8px;-moz-border-radius: 8px;-webkit-border-radius: 8px;">
                         <label for="d_dep" style="margin-top:-2%;margin-left:5%">Date</label>

                   </div>


                       <div class="input-field col s3">
                         {{ csrf_field() }}
                         <button class="btn-large waves-effect waves-light deep-orange lighten-1" style="border-radius: 12px;border: 2px solid;background-color:#fff"  type="submit" id="search" name="action">Trouver</button>
                       </div>
                  </form>
        			</h4>
  		   	  </div>
</center>
    </div>
    <div class="col s12 m4 l1"></div>
  </div>

</div>

<br><br><br>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->





<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<section id="resultats-trajets">
<div  class ="row">
  <div id="results" class="col s6 l6 m6"></div>
  <div class="col s6 l6 m6 " id="map"></div>
</div>
<ul id="pagin">

</ul>
</section>


<section class="row">
<div class="col s12">
<div class="col s2"></div>
<div class="col s8">
<div class="col s8">
<img src="{{ asset('/img/home_1.jpg') }}" style="width:100%"alt="">
</div>
<div class="col s4"><br><br><br>
  <h5><b style="color:#ff8a65">Vous prenez le volant ?<br>Dites-nous où vous allez !</b></h5>
  Profitez d'un trajet à moindre frais.
</div>
</div>
<div class="col s2"></div>
</div>
</section>
<br><br><br><br>
<section class="row" style="background-color:#ff8a65">
  <div class="col s12">
  <div class="col s2"></div>
  <div class="col s8"><br><br>
    <h4 style="color:#fff">Allez où vous voulez. D'où vous voulez.</h4> <br>
    <div class="col s4">
      <h5><b>Pratique</b></h5><br>
      Trouvez rapidement un covoiturage à proximité parmi les millions de trajets proposés.
    </div>
    <div class="col s4">
      <h5><b>Facile</b></h5><br>
      Réservez le trajet parfait ! Il suffit d'entrer votre adresse exacte et de choisir avec qui vous voulez voyager.
    </div>
    <div class="col s4">
<h5><b>Direct</b></h5><br>
Vous arrivez à ladresse exacte de votre destination sans perdre de temps sur le quai ou dans les files d'attente.<br><br><br><br>
    </div>


  </div>
  <div class="col s2"></div>
  </div>
</section>
<br><br><br><br>

<section class="row">
<div class="col s12">
<div class="col s2"></div>
<div class="col s8">

<div class="col s4"><br>
  <h5><b style="color:#ff8a65">Comment ça marche ?</b></h5>
  <b>Vous êtes passager ?</b><br>
  1. Recherchez votre trajet <br> 2. Réservez et payez par points <br> 3. le conducteur passe vous prendre.
<b>Vous êtes conducteur ?</b><br>
  1. Publiez votre annonce <br> 2. Vos passagers réservent et paient par points en ligne <br>3. passer prendre le passager <br> 4. Recevez votre argent
</div>
<div class="col s8">
<img src="{{ asset('/img/home_2.jpg') }}" style="width:90%"alt="">
</div>
</div>
<div class="col s2"></div>
</div>
</section>
<div id="notif_mess" class="modal" style="background-color: #1b2836;width: 75% !important ; height: 75% !important ;">
<div class="modal-content white-text">
<center><br><br>
<i class="large material-icons" style="width: 75%; height: 75%">assistant_photo</i><br><br>
<p style="font-size:120%">Votre reponse sur la demande du trajet a bien etais envoyer au demandeur</p>
</center>
</div>
</div>
</body>
<br><br><br><br><br>
  <script>
$("#qDep").autocomplete({source:"rech_quart",messages:{noResults:"",results:function(){}},minLength:3,select:function(e,s){$("#qDep").val(s.item.value)}}),$("#uDes").autocomplete({source:"rech_univ",messages:{noResults:"",results:function(){}},minLength:3,select:function(e,s){$("#uDes").val(s.item.value)}}),$("#search").submit(function(){return $("#results").empty(),console.log("clicked"),$.ajax({data:$("#search").serialize(),type:"POST",dataType:"json",url:"cherch_trajet",success:function(e){initMap(),directionsService=new google.maps.DirectionsService,directionsDisplay=new google.maps.DirectionsRenderer,directionsDisplay.setMap(map);for(var s=0;s<e.length;s++){0,trajets[s]=e[s];var a=e[s],i=a.login,t=$("<div></div>").addClass("col s12 l12 m12 left line-content card ").attr("id","trajet"+s.toString()),d=$("<div></div>").addClass("col s2 l2 m2 row center-align"),r=$("<div></div>").addClass("col s10 l10 m10 row"),l=$("<div></div>").addClass("row"),o=$("<div></div>").addClass("col s10 l10 m10 row"),n=($("<div></div>").addClass("col s4 l4 m4 row"),$("<div></div>").addClass("row right-align")),c=$("<img>").addClass("circle responsive-img activator card-profile-image").attr("src","./profils/"+a.pr).height(70).width(70),p=$("<div></div>").addClass("card-content"),m=$("<span></span>").addClass("card-title activator grey-text"),u=$("<a onclick=\"@if(Auth::user()) decDemande('y',"+a.id_propo+","+a.id_trajet+"); @else decDemande('n',"+a.id_propo+","+a.id_trajet+'); @endif" >Demander le Trajet</a>').addClass("plink btn btn-1 modal-trigger"),v=$("<a> </a>").addClass("btn-floating activator btn-move-up waves-effect waves-light white right more_info").attr("id","info"+s.toString()),g=$("<i></i>").addClass("material-icons res").text("open_with"),f=$("<i></i>").addClass("material-icons res").text("date_range"),C=$("<i></i>").addClass("material-icons res").text("date_range"),_=$("<i></i>").addClass("material-icons res").text("trending_up"),x=$("<p></p>").addClass("col s10 l10 m10").text("Date publication: "+a.date_pub),h=$("<p></p>").addClass("col s10 l10 m10").text("Date départ: "+a.date_dep);if("free"===a.dis[0].discussion)var w=$("<i></i>").addClass("material-icons res").text("sentiment_very_dissatisfied").css("color","red");else if("basic"===a.dis[0].discussion)w=$("<i></i>").addClass("material-icons res").text("sentiment_very_neutral").css("color","orange");else if("premium"===a.dis[0].discussion)w=$("<i></i>").addClass("material-icons res").text("sentiment_very_satisfied").css("color","green");if("free"===a.dis[0].cigarette)var D=$("<i></i>").addClass("material-icons res").text("smoke_free").css("color","red");else if("basic"===a.dis[0].cigarette)D=$("<i></i>").addClass("material-icons res").text("smoking_rooms").css("color","red");else if("premium"===a.dis[0].cigarette)D=$("<i></i>").addClass("material-icons res").text("smoking_rooms").css("color","green");if("free"===a.dis[0].musique)var b=$("<i></i>").addClass("material-icons res").text("volume_off").css("color","red");else if("basic"===a.dis[0].musique)b=$("<i></i>").addClass("material-icons res").text("volume_dow1").css("color","orange");else if("premium"===a.dis[0].musique)b=$("<i></i>").addClass("material-icons res").text("volume_up").css("color","green");var y=$("<p></p>").addClass("col s12 l12 m12").text(i.login.toUpperCase()),j=$("<p></p>").addClass("col s6 m6 l6").text("Distance: "+a.nbkm),k=$("<i></i>").addClass("col s2 l2 m2 material-icons res").text("arrow_forward"),q=$("<p></p>").addClass("col s5 l5 m5").text(a.src),S=$("<p></p>").addClass("col s5 l5 m5").text(a.des);x.prepend(C),j.prepend(_),h.prepend(f),v.append(g),d.append(c),r.append(q).append(k).append(S),o.append(h).append(x).append(j),n.append(u),l.append(v),d.append(y).append(w).append(D).append(b),p.append(m).append(d).append(r).append(o).append(n),t.append(l).append(p),$("#results").append(t),Geocode(a.src+",Marrakech",s)}$("#map").show()}}),!1});

  </script>
<script>

  $(document).ready(function(){$(".datepicker").pickadate({closeOnSelect:!0,format:"yyyy-mm-dd"})}),$("#results").on("click",".more_info",function(){console.log("yeah ");var e=$(this).attr("id");e=e.split(""),e=parseInt(e[e.length-1]);for(var t=0;t<trajets.length;t++)if(t==e){var r="#trajet"+e;$(r).show()}else{r="#trajet"+t.toString();$(r).remove()}deleteMarkers(),console.log(trajets[e].src+",Marrakech"),calculateAndDisplayRoute(directionsService,directionsDisplay,trajets[e].src+",Marrakech",trajets[e].des+",Marrakech")});
</script>


@endsection
