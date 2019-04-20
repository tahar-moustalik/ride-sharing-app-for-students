    @foreach ($threads as $thread)
      @php $i = 0 @endphp
                <div id="email-details" class="card-panel col s12  m12 l12 more_info e{{$i}}" hidden>
            <p class="email-subject truncate center-align">{{ $thread->subject }}<span class="email-tag grey lighten-3">inbox</span>
                  </p>
                  <hr class="grey-text text-lighten-2">
                  <div class="email-content-wrap">
                    <div class="row">
                      <div class="col s10 m10 l10">
                        <ul class="collection">
                          <li class="collection-item avatar">
               <img src="{{asset('profils/7-tahar-moustalik.jpeg')}}" height ="42" width="42" alt="" class="circle">
                     <span class="email-title">{{ $thread->subject }}</span>
                     <p class="truncate grey-text ultra-small">{{ $thread->creator()->login }}</p>
                          </li>
                        </ul>
                      </div>
                      <div class="col s2 m2 l2 email-actions">
                        <a href="#!"><span><i class="material-icons">reply</i></span></a>
                      </div>
                    </div>
                    <div class="email-content">
                      <p>{{ $thread->latestMessage->body }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="email-reply">
                    <div class="row">
                      <div class="col s12 m12 l12 center-align">
                        <a href="!#"><i class="material-icons">reply</i></a>
                        <p class="ultra-small">Répondre</p>
                      </div>
                    </div>
                  </div>
                </div>
               @php $i++ @endphp
        @endforeach
       <div hidden>
        {{$threads->links('vendor.pagination.materializecss')}}</div>
