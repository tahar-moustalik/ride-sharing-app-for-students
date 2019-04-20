
                    @if(isset($threads))
                              <div id="modal-mess" class="modal" style="display: block;opacity: 1;top:10%;">
         <div class="modal-content">
                <nav style="background-color: #1b2836;">
                  <div class="nav-wrapper">
                    <div class="left col s12 m5 l5">
                      <ul>
                        <li><a href="#!">Messages privés</a>
                        </li>
                         <li><a href="#" id="new-mess" class = "plink btn btn-1">Nouveau message</a></li>
                      </ul>
                    </div>

                  </div>
                </nav>
              </div>
              <div style="background-color: #1b2836;">
                <div class="row">
                    <ul class="collection  email-unread" >
                 @foreach ($threads as $thread)
                @php $i = 0 @endphp
                   @if($thread->creator()->login != Auth::user()->login)
                  <li class="collection-item avatar small-mess received" id="s{{$i}}">
                    <span class="circle red darken-1">{{strtoupper($thread->creator()->login[0])}}</span>
                      <span class="email-title">{{ $thread->subject }}</span>
     <p class="truncate grey-text ultra-small">  {{ $thread->latestMessage->body }}</p>
                      <a href="#!" class="secondary-content"><span class="new badge blue">{{ $thread->userUnreadMessagesCount(Auth::id()) }}  </span></a>
                    </li>

                  @php $i++ @endphp
                  @endif
            @endforeach
            </ul>

                </div>
              </div>
        </div>
            @endif
