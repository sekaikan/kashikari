<ul class="media-list">
    <a href="posts/create" class="btn btn-secondary btn-lg btn-block" role="button">Create！</a>
@foreach ($posts as $post)
    <?php $user = $post->user; ?>
    <li class="media">
        <div class="media-left">
           <img src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt="" class="img-circle" style=" margin-right:10px; margin-top:25px;  border-radius: 20px;">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $post->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($post->content)) !!}</p>
                <p>{!! nl2br(e($post->status)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $post->user_id)
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $posts->render() !!}