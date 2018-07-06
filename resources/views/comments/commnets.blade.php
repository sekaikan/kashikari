@foreach ($comments as $comment)
<div class="card my-3">
    <div class="card-body">
        <p class="">{{ $comment->user->name }}</p>
        <p class="display-4">{{ $comment->content }}</p>
        <p class="small text-muted">Posted at {{ $comment->created_at }}</p>
    </div>
</div>
@endforeach

{!! $comments->render() !!}

