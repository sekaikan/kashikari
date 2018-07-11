@foreach ($chats as $chat)
    @if(Auth::id() == $chat->user_id)
        <div class="card my-3 border-primary bg-light">
            <div class="card-body">
                <p class="text-muted">{!! link_to_route('users.show', $chat->user->name, ['id' => $chat->user->id]) !!}</p>
                <p class="text-lead">{{ $chat->content }}</p>
                <p class="small text-muted">Posted at {{ $chat->created_at }}</p>
                {!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                 {!! Form::close() !!}
             </div>
        </div>
    @else
        <div class="card my-3">
            <div class="card-body">
                <p class="text-muted">{!! link_to_route('users.show', $chat->user->name, ['id' => $chat->user->id]) !!}</p>
                <p class="text-lead">{{ $chat->content }}</p>
                <p class="small text-muted">Posted at {{ $chat->created_at }}</p>
            </div>
        </div>
    @endif
@endforeach

{!! $chats->render() !!}