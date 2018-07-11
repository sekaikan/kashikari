<?php
$stack = array();
foreach($replies as $reply) {
    array_push($stack,array($reply,0));
}
?>

@while(count($stack)>0)
    <?php
    $replyinfo = array_pop($stack);
    $reply = $replyinfo[0];
    $depth = $replyinfo[1];
    $spacer = 0;
    ?>
    <div class="row justify-content-end">
        @for($i=0;$i<$depth;$i++)
            <?php $spacer += 1 ?>
        @endfor
        <div class="col-md-{{ 12 - $spacer}}">
            <?php $user = $reply->user; ?>
            <div class="card p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                           <img src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt="" class="rounded-circle">
                        </div>
                        <div class="col-md-10">
                            <div>
                                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $reply->created_at }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Reply ID: {{ $reply->id }}</p>
                            <p>Replying to {{ $reply->reply_id }}.</p>
                            <p>{!! nl2br(e($reply->content)) !!}</p>
                            <p>{!! nl2br(e($reply->status)) !!}</p>
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-end">
                                @if (Auth::id() == $reply->user_id)
                                    {!! Form::open(['route' => ['replies.destroy', $reply->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                    {!! Form::close() !!}
                                @endif
                                {!! link_to_route('replies.create','Reply', ['reply_id' => $reply->id], ['class'=>'btn btn-primary']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $ch_replies = $reply->where('reply_id', $reply->id)->get();
    foreach($ch_replies as $r) {
        array_push($stack,array($r,$depth+1));
    }
    ?>
@endwhile

