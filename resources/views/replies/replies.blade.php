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
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 col-2">
                           <img class="usericon" src="{{ $user->photo }}">
                        </div>
                        <div class="col-md-8 col-8 px-0">
                            {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}<small> <span class="text-muted">at {{ $reply->created_at }}</span>
                            </small>
                        </div>
                        <div class="col-md-2 col-2 text-right">
                            @if (Auth::id() == $reply->user_id)
                                {!! Form::open(['route' => ['replies.destroy', $reply->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 offset-md-2 col-7 offset-2 px-0">
                            <p class="card-text">{!! nl2br(e($reply->content)) !!}</p>
                        </div>
                        <div class="col-md-3 col-3 text-right align-self-end">
                            <a data-toggle="collapse" href="#collapsePost{{$reply->id}}" aria-expanded="false" aria-controls="collapseExample">
                                <i class="fas fa-reply"></i>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="collapse" id="collapsePost{{$reply->id}}">
                                <hr>
                                <p>You are replying to {{ App\User::find($reply->user_id)->name }}.</p>
                                {!! Form::open(['route' => 'replies.store']) !!}
                                    <div class="form-group" id="review-form-group">
                                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...', 'rows'=>'2']) !!}
                                        {{ Form::hidden('post_id', $reply->post_id) }}
                                        {{ Form::hidden('reply_id', $reply->id) }}
                                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
                                    </div>
                                {!! Form::close() !!}
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

