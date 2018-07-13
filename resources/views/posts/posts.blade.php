@foreach ($posts as $post)
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-1 col-2">
                   <img src="{{ Gravatar::src($post->user->email, 1000) . '&d=mm' }}" alt="" class="rounded-circle img-fluid">
                </div>
                <div class="col-md-10 col-8">
                    {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!} <span class="text-muted">at {{ $post->created_at }}</span>
                </div>
                <div class="col-md-1 col-2">
                        @if (Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                            {!! Form::close() !!}
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 col-9 offset-2">
                    <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                    <p class="card-text">{!! nl2br(e($post->status)) !!}</p>
                    {!! link_to_route('posts.show','Reply', ['id' => $post->id], ['class'=>'btn btn-primary btn-block']) !!}
                </div>
                {{--
                <div class="col-1">
                    <a data-toggle="collapse" href="#collapsePost{{$post->id}}" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-reply"></i>
                    </a>
                </div>
                <div class="col-12">
                    <div class="collapse" id="collapsePost{{$post->id}}">
                        <hr>
                        <p>You are replying to {{ App\User::find($post->user_id)->name }}.</p>
                        
                        @if (Auth::id() == $post->user->id)
                            {!! Form::open(['route' => 'replies.store']) !!}
                            <div class="form-group" id="review-form-group">
                                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...', 'rows'=>'2']) !!}
                                {{ Form::hidden('post_id', $post->id) }}
                                {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
                --}}
            </div>
        </div>
    </div>
@endforeach

{!! $posts->render() !!}

