
   @if(isset($_GET['res']))
   {{$_GET['res']}}
   @foreach($_GET['res'] as $tl)
                   <h1>KFGJ</h1>
                    <ul class="collection  email-unread" >
                @php $i = 0 @endphp

                  <li class="collection-item avatar small-mess received" id="s{{$i}}">
                  <span class="circle red darken-1">strtoupper($thread->creator()->login[0])</span>
                  <span class="email-title"> {{$tl['id']}}</span>
     <p class="truncate grey-text ultra-small">   $thread->latestMessage->body </p>
                <a href="#!" class="secondary-content"><span class="new badge blue">$thread->userUnreadMessagesCount(Auth::id())  </span></a>
                    </li>

                  @php $i++ @endphp
                  @endforeach
             @endif
            </ul>

