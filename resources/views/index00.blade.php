
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
  var map ;
  var pageSize = 3;
  var trajets = [];
  var markers = [];
    var directionsService ;
    var directionsDisplay;
    function initMap(){
   var options = {
     zoom : 12,
    center :{lat :  31.6336545,lng :-8.008899},
    mapTypeId: google.maps.MapTypeId.ROADMAP
   }
 map = new google.maps.Map(document.getElementById('map'),options);
  }

   function Geocode(adr,i){
        axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
        params:{
        address:adr,
         key:'AIzaSyAmNizz-HWH1_deJlvn2HvzgNHGOP4UrvQ'
        }
      })
      .then(function(response){
        console.log(response);
        var lt = response.data.results[0].geometry.location.lat;
        var lg = response.data.results[0].geometry.location.lng;
         console.log(lt +""+ lg );
        dispMarker(lt,lg,map);

      })
      .catch(function(error){
        console.log(error);
      });
  }



function dispMarker(lt,lg,map,i){
  var marker = new google.maps.Marker({
    position:{lat :parseFloat(lt),lng :parseFloat(lg)},
    map:map
  });
  markers.push(marker);
}
function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
          markers[i].setMap(map);
        }
      }
 function clearMarkers() {
        setMapOnAll(null);
      }
  function deleteMarkers() {
        clearMarkers();
        markers = [];
      }
  showPage = function(page) {
	    $(".line-content").hide();
	    $(".line-content").each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });
	}
    function calculateAndDisplayRoute(directionsService, directionsDisplay,start,end) {
        directionsService.route({
          origin: start,
          destination: end,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
  	$("#pagin li a").click(function() {
	    $("#pagin li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text()))
	});

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
    background-image: url("/img/home.jpg");
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
<script type="text/javascript">
function vide_map(){
if($("#map").html()==''){
document.getElementById('map').style.height='0px';
}
}
</script>
<body onload="vide_map();">

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
  <div id="results" class="col s6"></div>
  <div class="col s6" id="map"></div>
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
</body>
<br><br><br><br><br>
<div id="dm_tra">ff:  </div>
  <script>

     $( "#qDep" ).autocomplete({

	  source: "rech_quart",
     messages: {
        noResults: '',
        results: function() {}
    },
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#qDep').val(ui.item.value);
	  }
	});

   $( "#uDes" ).autocomplete({

	  source: "rech_univ",
     messages: {
        noResults: '',
        results: function() {}
    },
	  minLength: 3,
	  select: function(event, ui) {
      $('#uDes').val(ui.item.value);

	  }
	});

 $('#search').submit(function() {
   document.getElementById('map').style.height='500px';
   $("#results").empty();
    console.log("clicked");
    $.ajax({
        data: $("#search").serialize(),
        type: "POST",
        dataType : 'json',
        url: 'cherch_trajet',
        success: function(response) {
          initMap();
     directionsService = new google.maps.DirectionsService;
     directionsDisplay = new google.maps.DirectionsRenderer;
            directionsDisplay.setMap(map);
          var count = 0;
      for (let i = 0; i < response.length; i++) {

        count++;
        trajets[i] = response[i];
        var trajet = response[i];

         var lga= trajet['login'];
    var trItem = $('<div></div>').addClass('col s12 left line-content').attr('id','trajet'+ i.toString());
    var row = $('<div></div>').addClass('col s2 row center-align');
    var row1 = $('<div></div>').addClass('col s10 row');
    var row2 = $('<div></div>').addClass('col s10 row');
    var row3 = $('<div></div>').addClass('col s4 row');
    var row4 = $('<div></div>').addClass(' row right-align');
    var card = $('<div></div>').addClass('card');
    var pr = $('<img>').addClass('circle responsive-img activator card-profile-image').attr('src','profils/'+trajet.pr).height(70).width(70);
    var card_cnt = $('<div></div>').addClass('card-content');
    var cr_title =  $('<span></span>').addClass('card-title activator grey-text');
    var dem = $('<a onclick="@if(Auth::user()) decDemande(\'y\','+trajet.id_propo+','+trajet.id_trajet+'); @else decDemande(\'n\','+trajet.id_propo+','+trajet.id_trajet+'); @endif" >Demander le Trajet</a>').addClass('plink btn btn-1 modal-trigger');
      var edit = $('<a> </a>').addClass('btn-floating activator btn-move-up waves-effect waves-light white right more_info').attr('id','info'+ i.toString());
        var editicon = $('<i></i>').addClass('material-icons res').text('open_with');
/*
trajet.id_tr
@if(Auth::user()) decDemande(\'y\'); @else decDemande(\'n\'); @endif
*/

        var iddep = $('<i></i>').addClass('material-icons res').text('date_range');
        var idpub = $('<i></i>').addClass('material-icons res').text('date_range');
         var inbkm = $('<i></i>').addClass('material-icons res').text('trending_up');

         var pdpub = $('<p></p>').addClass('col s10').text("Date publication: "+trajet.date_pub);

var pddep = $('<p></p>').addClass('col s10').text("Date départ: "+trajet.date_dep);


if(trajet.dis[0]['discussion']==="free"){

var perf1 = $('<i></i>').addClass('material-icons res').text('sentiment_very_dissatisfied').css('color','red');
}else if(trajet.dis[0]['discussion']==="basic"){
var perf1 = $('<i></i>').addClass('material-icons res').text('sentiment_very_neutral').css('color','orange');
}else if(trajet.dis[0]['discussion']==="premium"){
var perf1 = $('<i></i>').addClass('material-icons res').text('sentiment_very_satisfied').css('color','green');
}

if(trajet.dis[0]['cigarette']==="free"){
var perf2 = $('<i></i>').addClass('material-icons res').text('smoke_free').css('color','red');
}else if(trajet.dis[0]['cigarette']==="basic"){
var perf2 = $('<i></i>').addClass('material-icons res').text('smoking_rooms').css('color','red');
}else if(trajet.dis[0]['cigarette']==="premium"){
var perf2 = $('<i></i>').addClass('material-icons res').text('smoking_rooms').css('color','green');
}

if(trajet.dis[0]['musique']==="free"){
var perf3 = $('<i></i>').addClass('material-icons res').text('volume_off').css('color','red');
}else if(trajet.dis[0]['musique']==="basic"){
var perf3 = $('<i></i>').addClass('material-icons res').text('volume_dow1').css('color','orange');
}else if(trajet.dis[0]['musique']==="premium"){
var perf3 = $('<i></i>').addClass('material-icons res').text('volume_up').css('color','green');
}


         var plogin = $('<p></p>').addClass('col s12').text(lga['login'].toUpperCase());

       var pnbkm = $('<p></p>').addClass('col s6').text("Distance: "+trajet.nbkm);

              var ifle= $('<i></i>').addClass('col s2 material-icons res').text('arrow_forward');
       var psrc = $('<p></p>').addClass('col s5').text(trajet.src);
      var pdes = $('<p></p>').addClass('col s5').text(trajet.des);
         pdpub.prepend(idpub);
        pnbkm.prepend(inbkm);
        pddep.prepend(iddep);
        edit.append(editicon);
        row.append(pr);
        row1.append(psrc).append(ifle).append(pdes);
        row2.append(pddep).append(pdpub).append(pnbkm);
        row3.append(plogin);
        row4.append(dem);
        row.append(plogin).append(perf1).append(perf2).append(perf3);
         card_cnt.append(cr_title).append(row).append(row3).append(row1).append(row2).append(row4);
         card.append(card_cnt);
         trItem.append(edit).append(card);
         $("#results").append(trItem);
     Geocode(trajet.src +""+",Marrakech",i);
}
     $("#map").show();
        }

    });
    return false;
});


function dmtr(id_t) {
    //alert(id_t);
    if (window.confirm('voulez-vous confirmez la demande du trajet ?'))
    {
      $('#dm_tra').load("/demand_tr?id_trjet="+id_t);
    }
}


  </script>
<script>

  $(document).ready(function () {
  $(".datepicker").pickadate({
    closeOnSelect: true,
    format: "yyyy-mm-dd"
  });
});

</script>
<script>
 $("#results" ).on( "click", '.more_info',function() {
  console.log("yeah ");
 // $("#results").remove();
  var info = $(this).attr('id');
  info = info.split("");
  info = parseInt(info[info.length -1]);
  for (var i=0;i<trajets.length;i++){
     if(i == info){
        var spec = "#trajet"+info;
       $(spec).show();
     }
     else{
      var spec = "#trajet"+ i.toString();
      $(spec).remove();
     }
  }
  deleteMarkers();
  console.log(trajets
  [info].src+""+",Marrakech");
  calculateAndDisplayRoute(directionsService,directionsDisplay,trajets
  [info].src+""+",Marrakech",trajets[info].des+""+",Marrakech");
});
</script>


@endsection
