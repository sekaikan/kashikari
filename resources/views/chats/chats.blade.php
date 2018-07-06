@foreach ($chats as $chat)
<div class="card my-3">
    <div class="card-body">
        <p class="">{{ $chat->user->name }}</p>
        <p class="display-4">{{ $chat->content }}</p>
        <p class="small text-muted">Posted at {{ $chat->created_at }}</p>
    </div>
</div>
@endforeach

{!! $chats->render() !!}