<?php
$class = $thread->isUnread(auth()->id()) ? 'active' : '';
$firstMsgId = isset($thread->getAllLatest()->first()->id) ? $thread->getAllLatest(auth()->id())->first()->id : 0;
?>
{{--<li data-target="#inbox-message-1" class="@if(isset($class) && $class !='') {{ $class }} @elseif($firstMsgId == $thread->id) active @endif">--}}
<li data-target="#inbox-message-1" class="@if($firstMsgId == $thread->id) active @endif">
{{--{{ $thread->id }}--}}
    @if(!empty($thread->userUnreadMessagesCount(auth()->id())))<div class="message-count"> {{ $thread->userUnreadMessagesCount(auth()->id()) }} </div>@endif
    {{--<img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">--}}
    @if(isset($thread->creator()->media) && isset($thread->creator()->media->main_image) && isset($thread->creator()->media->main_image->styles['thumbnail']))
        <img src="{{url('/')}}/{{ $thread->creator()->media->main_image->styles['thumbnail'] }}" width="60" height="60" class="img-circle medium-image" alt="user-pic"/>
    @else
        <img src="{{ url('/') }}/assets/images/user.png" width="60" height="60" class="img-circle medium-image" alt="user-pic"/>
    @endif

    <div class="vcentered info-combo">
        <h3 class="no-margin-bottom name"> {{ $thread->creator()->name }} </h3>
        <a href="{{ route('messages.show', $thread->id) }}"><h5> {{ $thread->subject }}</h5></a>
    </div>
    <div class="contacts-add">
        {{--<span class="message-time"> 2:32 <sup>AM</sup></span>--}}
        <?php
        $dateStr = explode(' ', $thread->created_at->diffForHumans(), 2);
//        echo '<pre>'; print_r($thread->creator()->id);
//        dd($dateStr);
        ?>
        <span class="message-time"> {{ $dateStr[0] }} <sup>{{ $dateStr[1] }}</sup></span>
        <i class="fa fa-trash-o"></i>
        <i class="fa fa-paperclip"></i>
    </div>

</li>