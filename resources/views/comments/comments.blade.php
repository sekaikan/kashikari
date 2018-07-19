<?php
$stack = array();
foreach($comments as $comment) {
    array_push($stack,array($comment,0));
}
?>

@while(count($stack)>0)
    <?php
    $commentinfo = array_pop($stack);
    $comment = $commentinfo[0];
    $depth = $commentinfo[1];
    $spacer = 0;
    ?>

    <div class="row justify-content-end">
            @for($i=0;$i<$depth;$i++)
                <?php $spacer += 1 ?>
            @endfor
            <div class="col-md-{{12-($spacer % 12)}}">
                <?php $user = $comment->user; ?>
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 col-2">
                                   <img src="{{ Gravatar::src($user->email, 1000) . '&d=mm' }}" alt="" class="rounded-circle img-fluid">
                                </div>
                                <div class="col-md-8 col-8 px-0">
                                    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}<small> <span class="text-muted">at {{ $comment->created_at }}</span>
                                    </small>
                                </div>
                                <div class="col-md-2 col-2 text-right">
                                        @if (Auth::id() == $comment->user_id)
                                            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                                            {!! Form::close() !!}
                                        @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 offset-md-2 col-7 offset-2 px-0">
                                    <p class="card-text">{!! nl2br(e($comment->content)) !!}</p>
                                </div>
                                <div class="col-md-3 col-3 text-right align-self-end">
                                    <a data-toggle="collapse" href="#collapsePost{{$comment->id}}" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-reply"></i>
                                    </a>
                                </div>
                                <div class="col-12">
                                    <div class="collapse" id="collapsePost{{$comment->id}}">
                                        <hr>
                                        <p>You are replying to {{ App\User::find($comment->user_id)->name }}.</p>
                                        
                                        @if (Auth::id() == $user->id)
                                        {!! Form::open(['route' => 'comments.store']) !!}
                                            <div class="form-group" id="review-form-group">
                                                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...', 'rows'=>'2']) !!}
                                                {{ Form::hidden('parent_id', $comment->id) }}
                                                {{ Form::hidden('item_id', $item->id) }}
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
    $ch_comments = $comment->where('parent_id', $comment->id)->get();
    foreach($ch_comments as $r) {
        array_push($stack,array($r,$depth+1));
    }
    ?>
@endwhile
