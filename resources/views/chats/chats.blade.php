@foreach ($chats as $chat)
    @if(Auth::id() == $chat->user_id)
        <div class="card my-3 border-primary bg-light">
            <div class="card-body">
                <p class="text-muted">{{ $chat->user->name }}</p>
                <p class="text-lead">{{ $chat->content }}</p>
                <p class="small text-muted">Posted at {{ $chat->created_at }}</p>
            </div>
        </div>
    @else
        <div class="card my-3">
            <div class="card-body">
                <p class="text-muted">{{ $chat->user->name }}</p>
                <p class="text-lead">{{ $chat->content }}</p>
                <p class="small text-muted">Posted at {{ $chat->created_at }}</p>
            </div>
        </div>
    @endif
@endforeach

{!! $chats->render() !!}