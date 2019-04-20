@extends('layouts.app')

@section('content')
    <div class="card center-align">
      <div class="card-content">
          <span class="card-title" id="specolor">Message</span>
        <h1 id="specolor">{{ $thread->subject }}</h1>
        @each('partials.messages', $thread->messages, 'message')
     </div>
        @include('partials.form-message')
    </div>
@stop
