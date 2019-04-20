
@extends('layouts.app')

@section('content')
<style>
    .fixed [type="checkbox"] + label, .fixed [type="radio"] + label {
  pointer-events: auto;
}
.ui-autocomplete{
  z-index: 50;
  background-color: #ff7043;
  color: white;

}

</style>
    <div class="card-panel ">
                <div class="row ">
                  <form class="col s12 " action="{{ route('messages.store') }}" method="post" >
                     {{ csrf_field() }}
                     <div class="col s6">
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="to_email" class="validate" name="to_email" type="text" required>
                        <label for="to_email" class="">A</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input id="subject" type="text" class="validate" name ="subject" value="{{ old('subject') }}"required>
                        <label for="subject" class="">Sujet</label>
                      </div>
                    </div>
                      </div>
                      <div class="col s6">
                    <div class="row">
                      <div class="input-field">
                        <textarea id="compose" class="materialize-textarea" length="500" name="message" required style="height:40%">{{ old('message') }}</textarea>
                        <label for="compose" class="">Message</label>
                      <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span></div>
                    </div>
</div>
<div class="row">
<div class="input-field col s12">
{{ csrf_field() }}
<button class="btn  waves-effect waves-light deep-orange lighten-1 right" type="submit" name="action" style="width:100%">Envoyer

</button>
</div>
</div>
                  </form>
                </div>
   </div>
   <script>
    $("#to_email").autocomplete({source:"{{route('list_users')}}",messages:{noResults:"",results:function(){}},minLength:3,select:function(e,t){$("#to_email").val(t.item.value)}});
   </script>

   @endsection
