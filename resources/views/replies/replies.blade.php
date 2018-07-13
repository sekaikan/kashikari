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
        <div class="col-md-{{ 12-($spacer % 12)}}">
            <?php $user = $reply->user; ?>
            <div class="card p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                           <img src="{{ Gravatar::src($user->email, 1000) . '&d=mm' }}" alt="" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-md-10">
                            <div>
                                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">at {{ $reply->created_at }}</span>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div>
                                @if (Auth::id() == $reply->user_id)
                                    {!! Form::open(['route' => ['replies.destroy', $reply->id], 'method' => 'delete']) !!}
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                                    {!! Form::close() !!}
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10 offset-1">
                            <p class="card-text">{!! nl2br(e($reply->content)) !!}</p>
                            <p class="card-text">{!! nl2br(e($reply->status)) !!}</p>
                        </div>
                        <div class="col-1">
                            <a data-toggle="collapse" href="#collapsePost{{$reply->id}}" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-reply"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="collapse" id="collapsePost{{$reply->id}}">
                                <hr>
                                <p>You are replying to {{ App\User::find($reply->user_id)->name }}.</p>
                                
                                @if (Auth::id() == $user->id)
                                {!! Form::open(['route' => 'replies.store']) !!}
                                    <div class="form-group" id="review-form-group">
                                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...', 'rows'=>'2']) !!}
                                        {{ Form::hidden('post_id', $reply->post_id) }}
                                        {{ Form::hidden('reply_id', $reply->id) }}
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
                                    </div>
                                    {!! Form::close() !!}
                                @endif
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

