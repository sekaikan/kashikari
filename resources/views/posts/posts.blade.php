@foreach ($posts as $post)
        <div class="card my-3 border-primary bg-light">
            <div class="card-body">
                <p class="text-muted">{{ $post->user->name }}</p>
                <p class="text-lead">{{ $post->content }}</p>
                <p class="small text-muted">Posted at {{ $post->created_at }}</p>
                {!! link_to_route('posts.show','Detail', ['id' => $post->id], ['class'=>'btn btn-success']) !!}
                {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                @if(Auth::id() == $post->user_id)
                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                @endif
                {!! Form::close() !!}
             </div>
        </div>
@endforeach

{!! $posts->render() !!}

