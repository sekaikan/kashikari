<div class="chats">
    @foreach ($chats as $chat)
        <div class="row my-3">
            @if(Auth::id() == $chat->user_id)
                <div class="col-6 offset-6">
                    <div class="row">
                        {{--<div class="col-2">
                            <img src="/images/user3.jpg" class="rounded-circle img-fluid">
                            <p class="text-muted">{!! link_to_route('users.show', $chat->user->name, ['id' => $chat->user->id]) !!}</p>
                        </div>--}}
                        <div class="col-10 p-3 rounded mycomment">
                            <p class="text-lead">{{ $chat->content }}</p>
                        </div>
                        <div class="col-9">
                            <span class="small text-muted">{{ $chat->created_at }}</span>
                        </div>
                        <div class="col-1">
                            {!! Form::open(['route' => ['chats.destroy', $chat->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                            {!! Form::button('<span class="small"><i class="fas fa-times"></i></span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary pt-0']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @else
                <div class="col-6">
                    <div class="row">
                        <div class="col-2">
                            <a href="{{route('users.show', ['id'=> $chat->user->id])}}"><img src="/images/user3.jpg" class="rounded-circle img-fluid"></a>
                            <p class="text-muted">{{ $chat->user->name }}</p>
                        </div>
                        <div class="col-10 bg-white p-3 rounded otherscomment">
                            <div class="says">
                                <p class="text-lead">{{ $chat->content }}</p>
                                <p class="small text-muted">{{ $chat->created_at }}</p>
                            </div>
                        </div>
                        <div class="col-12 text-right">
                                <span class="small text-muted">{{ $chat->created_at }}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endforeach
{!! $chats->render() !!}
</div>