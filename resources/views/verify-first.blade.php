
@extends('layouts.app')
@section('content')
<style>
    .color_text{
  color : #13515b;
}
</style>
<!--<script src="js/script.js"></script> -->
<script>
 

  // Or with jQuery
 $(".plink").remove();
 $(".ilink").remove();
 $(".clink").remove();
  $(document).ready(function () {
  $(".datepicker").pickadate({
    closeOnSelect: true,
    format: "dd/mm/yyyy"
  });
}); 
$('i').addclass('deep-orange lighten-1;')
</script>
<div class="container  center-align">
  <div class="row">
        <div class="col s12 m6">
          <div class="card deep-orange lighten-1">
            <div class="card-content white-text">
              <span class="card-title">Verification Email</span>
              <p>Pour accéder à la plateforme Veuillez Vérifier Votre Email </p>
            </div>
           
          </div>
        </div>
      </div>
    </div>         
              
            

        
@endsection