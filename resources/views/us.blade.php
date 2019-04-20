@extends('layouts.app')
@section('content')
<style media="screen">
.first {
margin-top:-10%;
padding-top:70px;
min-height:400px;
background-size:cover;
background-size: 100%;
background-repeat: no-repeat
height: 100%;
width: 100%;

}
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 500%;
}
.parallax {
    /* The image used */
    background-image: url("img/header_us1.png");
margin-top:-5%;
    /* Set a specific height */
    min-height: 500px;
background-color: #ff7043;

    /* Create the parallax scrolling effect */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>

<section class="parallax">
<div class="centered"><b>Qui somme-nous ?</b></div>

</section>
<br><br>
<section class="row">
  <div class="col s12">
    <div class="col s3"></div>
    <div class="col s6">
<center>
  <div class="card"><br><br>
    <h4>CovoitLbahja ?</h4><br>
  <p>
Covoit Lbehja rassemble la plus large communauté de covoiturage<br>courte distance a Marrakech.
La startup Marocaine met en relation<br>des conducteurs voyageant avec des places libres et des passagers<br>souhaitant faire le même trajet.
Les coûts du trajet<br>sont partagés entre les covoitureurs.<br><br><br>
  </p>
</div>
</center>
</div>
<div class="col s3"></div>
</div>
</section>


               <section>
                 <div class="row">
   <div class="col s12">

    <center>


<div class="col s2"></div>
<div class="card col s8"><br><br>
  <h4>Notre equipe</h4><br>
<div class="col s3">
       <div class="card-content white-text">
         <img src="img/team/med.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
         <p style="color:#000">OUAALI Mohamad</p>
         <p style="color:grey">Developer</p>
       </div>
</div>
<div class="col s3">
       <div class="card-content white-text">
         <img src="img/team/lbg.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<p style="color:#000">LABGHALI Mohamed Amine</p>
<p style="color:grey">Developer</p>
       </div>
</div>
<div class="col s3">
       <div class="card-content white-text">
         <img src="img/team/mou.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<p style="color:#000">MOUSTALIK Tahar</p>
<p style="color:grey">Developer</p>
       </div>
</div>
<div class="col s3">
       <div class="card-content white-text">
         <img src="img/team/ibr.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
<p style="color:#000">IBRGHOUTN Hamza</p>
<p style="color:grey">Developer</p>
       </div>
</div><br><br><br>
</div>
<div class="col s2"></div>
</center>

     </div>
   </div>

  </section>
@endsection
