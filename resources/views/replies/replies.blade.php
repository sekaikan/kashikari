<?php

$stack = array();
foreach($replies as $reply) {
    array_push($stack,$reply);
}

while(count($stack)>0) {
    $reply = array_pop ($stack);
    echo $reply->id . '->' . $reply->reply_id . "<br>";
    $ch_replies = $reply->where('reply_id', $reply->id)->get();
    foreach($ch_replies as $r) {
        array_push($stack,$r);
    }
}
return;
?>







@foreach ($replies as $reply)
    <?php $user = $reply->user; ?>
    <div class="card">
        <div class="col-md-2">
           <img src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt="" class="img-circle" style=" margin-right:10px; margin-top:25px;  border-radius: 20px;">
        </div>
        <div class="col-md-10">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $reply->created_at }}</span>
            </div>
            <div>
                <p>Reply ID: {{ $reply->id }}</p>
                <p>Replying to {{ $reply->reply_id }}.</p>
                <p>{!! nl2br(e($reply->content)) !!}</p>
                <p>{!! nl2br(e($reply->status)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $reply->user_id)
                    {!! Form::open(['route' => ['replies.destroy', $reply->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                {!! link_to_route('replies.create','返信する!', ['reply_id' => $reply->id]) !!}
            </div>
        </div>
    </div>
    <?php $ch_replies = $reply->where('reply_id', $reply->id)->get(); ?>
    @foreach ($ch_replies as $ch_reply)
        <?php $ch_user = $ch_reply->user; ?>
        <div class="col-md-10 offset-md-2">
            <div class="card">
                <div class="col-md-2">
                   <img src="{{ Gravatar::src($ch_user->email, 30) . '&d=mm' }}" alt="" class="img-circle" style=" margin-right:10px; margin-top:25px;  border-radius: 20px;">
                </div>
                <div class="col-md-10">
                    <div>
                        {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $ch_reply->created_at }}</span>
                    </div>
                    <div>
                        <p>Reply ID: {{ $ch_reply->id }}</p>
                        <p>Replying to {{ $ch_reply->reply_id }}.</p>
                        <p>{!! nl2br(e($ch_reply->content)) !!}</p>
                        <p>{!! nl2br(e($ch_reply->status)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $ch_reply->user_id)
                            {!! Form::open(['route' => ['replies.destroy', $ch_reply->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                            {!! Form::close() !!}
                        @endif
                        {!! link_to_route('replies.create','返信する!', ['reply_id' => $ch_reply->id]) !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach
