<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>
     <div id="email-list" class="col s12 m4 l4 card-panel z-depth-1">
                  <ul class="collection">
                    <li class="collection-item avatar email-unread">
                    <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
                      <span class="email-title">{{ $thread->subject }}</span>
     <p class="truncate grey-text ultra-small">  {{ $thread->latestMessage->body }}</p>
                      <a href="#!" class="secondary-content"><span class="new badge blue">{{ $thread->userUnreadMessagesCount(Auth::id()) }} </span></a>
                    </li>
                  </ul>
                </div>
