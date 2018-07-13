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
                <div class="card">
                    <div class="card-body">
                        This is replying to {{ $comment->parent_id }}.
                        <p class="">{{ $comment->user->name }}</p>
                        <p class="display-4">{{ $comment->content }}</p>
                        <p class="small text-muted">Posted at {{ $comment->created_at }}</p>
                        <div class="col-1">
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
    <?php
    $ch_comments = $comment->where('parent_id', $comment->id)->get();
    foreach($ch_comments as $r) {
        array_push($stack,array($r,$depth+1));
    }
    ?>
@endwhile
