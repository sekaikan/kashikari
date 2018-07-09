<ul class="media-list">
<a href="{{ route ('replies.create') }}" class="btn btn-secondary btn-lg btn-block" role="button">Create！</a>
@foreach ($replies as $reply)
    <?php $user = $reply->user; ?>
 
    <li class="media">
        <div class="media-left">
           <img src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt="" class="img-circle" style=" margin-right:10px; margin-top:25px;  border-radius: 20px;">
        </div>
        <div class="media-body">
            <div>
                {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $reply->created_at }}</span>
            </div>
            <div>
                <p>{!! nl2br(e($reply->content)) !!}</p>
                <p>{!! nl2br(e($reply->status)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $reply->user_id)
                    {!! Form::open(['route' => ['replies.destroy', $reply->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $replies->render() !!}