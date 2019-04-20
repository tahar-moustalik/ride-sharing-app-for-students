@extends('layouts.app')
@section('content')

<div class="row">
<center>
<div class="col s12 m2 l2"></div>
<div class="col s12 m4 l4">
<img src="img/notif1.png" type="submit" id="dm_en" onclick="return false;">
</div>
<div class="col s12 m4 l4">
<img src="img/notif2.png" type="submit" id="dm_re" onclick="return false;">
</div>
<div class="col s12 m2 l2"></div>
</center>
</div>


<div id="resultat_en" hidden>
</div>
<div id="resultat_re" hidden>
</div>


<script>
$(function(){$('#dm_en[type="submit"]').click(function(){$("#resultat_re").hide(),$("#resultat_en").show()}),$('#dm_re[type="submit"]').click(function(){$("#resultat_en").hide(),$("#resultat_re").show(),$("#resultat_re").load("/resultat_re")})});
</script>



@endsection
