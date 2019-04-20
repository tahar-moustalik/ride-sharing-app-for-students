@extends('layouts.app')
@section('content')
<style>
  .clockpicker-tick:hover { background: #ff7043 !important; }
.clockpicker-canvas line { stroke: #ff7043  !important; }
.clockpicker-canvas-bearing {
  fill: #ff7043 !important;
}
.clockpicker-canvas-bg {
  fill: #ff7043 !important;
}
.picker__close {
  color: #ff7043 !important;
}
.clockpicker-canvas line {
  stroke: #ff7043 ;
}
.clockpicker-tick:hover {
  background: #ff7043;
}
.ui-autocomplete{
  z-index: 50;
  background-color: #ff7043;
  color: white;

}

</style>
<script>
$(".plink").remove(),$("#qDep").autocomplete({source:"rech_quart",messages:{noResults:"",results:function(){}},minLength:3,select:function(e,t){$("#qDep").val(t.item.value)}});
</script>

<section id = "propo_trajet">
  <br>
  @if(isset($done))

  <div class="row center">
    <div class="col s12 ">
      <div class="card deep-orange lighten-1">
        <div class="card-content white-text">
          <span class="card-title">Notification</span>
          <p>Votre Trajet été ajouter avec Success</p>
        </div>

      </div>
    </div>
  </div>

@endif
<h4 id="specolor" class="center ">Publier un Trajet</h4>
<h5 id="specolor" class="center" >Votre Itinéraire</h5>
<div class="section no-pad-bot">
  <div class="container">
    <div class="card-panel" style="border:solid 0.5px #ff7043;">
        <h4 class= "header2 color_text">Itinéraire</h4>
        <div class="row">
        <form action="{{route('submit_trajet',[],true)}}"  id = "formValidate" class="col s12 " method="POST">
             <div class="row">
                    <div class="input-field col l3">
            <i class="material-icons prefix">near_me</i>
  <input id="qDep"  name = "qDep" type="text"  class="validate" required></input>
            <label for="qDep">Doù Partez-vous ?</label>
          </div>
                <div class="input-field col l3">
            <i class="material-icons prefix">near_me</i>
            <input id="uDes" type="text"  name = "uDes" class="validate" required>
            <label for="uDes">Où Allez-vous ?</label>
          </div>
             </div>
             <div class="row">
                  <div class="input-field col l3">
                      <i class="material-icons prefix">date_range</i>
                <input type="text" class="datepicker" id="d_dep" name="d_dep" required>
                <label for="d_dep">Date Départ </label>
                  </div>
                  <div class="input-field col l3">
                      <i class="material-icons prefix">date_range</i>
                <input type="text" class="timepicker" id="t_dep" name="t_dep" required>
                <label for="t_dep">Heure Départ </label>
                  </div>
             </div>
                 <div class="row">
                      <div class="input-field col l3">
                      <i class="material-icons prefix">trending_up</i>
                <input type="text" id="nbkm" name="nbkm" required>
                <label for="nbkm">Nombre de Kilomètre</label>
                      </div>
             </div>
             <div class="row">
                    <div class="input-field col l12 right">
                         {{ csrf_field() }}
               <button class = "btn deep-orange lighten-1  waves-effect waves-light right" type = "submit" class="validate">
                   Soumettre
               </button>

             </div>
             </div>
            </form>
    </div>
</div>
</div>
</div>
</section>

<script>
function dispModal(){$(document).ready(function(){$(".modal").modal()})}$(document).ready(function(){$(".datepicker").pickadate({closeOnSelect:!0,format:"yyyy-mm-dd"})}),$(".timepicker").pickatime({default:"now",twelvehour:!1,donetext:"OK",autoclose:!1,vibrate:!0}),$("#qDep").autocomplete({source:"rech_quart",messages:{noResults:"",results:function(){}},minLength:3,select:function(e,t){$("#qDep").val(t.item.value)}}),$("#uDes").autocomplete({source:"rech_univ",messages:{noResults:"",results:function(){}},minLength:3,select:function(e,t){$("#uDes").val(t.item.value)}});
</script>
@endsection
