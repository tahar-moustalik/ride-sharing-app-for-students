<div>
    <a  href="#">
        <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->login }}">
    </a>
    <div>
        <h5 id="specolor" >{{ $message->user->login }}</h5>
        <p id="specolor">{{ $message->body }}</p>
        <div>
            <small id="specolor">Envoyé il y a   {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
