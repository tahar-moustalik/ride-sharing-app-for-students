<style>
    .fixed [type="checkbox"] + label, .fixed [type="radio"] + label {
  pointer-events: auto;
}

</style>
<div class="section no-pad-bot">
    <div class="container">
        <div class="card-panel">
<h2>Ajouter un nouveau message</h2>
<form action="{{ route('messages.update', $thread->id) }}" method="post" class="col s12">
    {{ method_field('put') }}
    {{ csrf_field() }}

    <!-- Message Form Input -->
    <div class="row">
        <div class="input-field col s12">
        <textarea name="message">{{ old('message') }}</textarea>
    </div>
    </div>

  @if($users->count() > 0)
               <div class="row">
                <div class="input-field col s6 fixed">
                    @foreach($users as $user)
          <input type="checkbox" id = "{{ $user->id_user }}" name="recipients[]"
               value="{{ $user->id_user }}">
     <label for="{{ $user->id_user }}">{!!$user->login!!}</label>
                    @endforeach
                </div>
                </div>
            @endif

    <!-- Submit Form Input -->
   <div class="row">
        <div class="input-field col s12">
        <button type="submit" class="btn deep-orange lighten-1  waves-effect waves-light right validate">Envoyer</button>
    </div>
   </div>
</form>
</div>
</div>
</div>
