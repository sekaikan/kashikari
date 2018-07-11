@foreach ($posts as $post)
    @if(Auth::id() == $post->user_id)
        <div class="card my-3 border-primary bg-light">
            <div class="card-body">
                <p class="text-muted">{!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}</p>
                <p class="text-lead">{{ $post->content }}</p>
                <p class="small text-muted">Posted at {{ $post->created_at }}</p>
                {!! link_to_route('posts.show','Reply', ['id' => $post->id], ['class'=>'btn btn-success']) !!}
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                {!! Form::close() !!}
             </div>
        </div>
    @else
        <div class="card my-3">
            <div class="card-body">
                <p class="text-muted">{!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}</p>
                <p class="text-lead">{{ $post->content }}</p>
                <p class="small text-muted">Posted at {{ $post->created_at }}</p>
                {!! link_to_route('replies.create','Reply', ['id' => $post->id], ['class'=>'btn btn-success']) !!}
            </div>
        </div>
    @endif
@endforeach

{!! $posts->render() !!}

