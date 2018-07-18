<?php $notifications = Auth::user()->notifications()->paginate(5); ?>
<div class="card">
    <div class="card-header">
        Notifications 
        @if($notifications->count()>0)
        <span class="badge badge-pill badge-danger">{{ Auth::user()->notifications()->count() }}</span>
        @endif
    </div>
    @if($notifications->count()==0)
    <div class="card-body">
        <p class="card-text text-muted"><i class="far fa-thumbs-up"></i> You have no new notifications.</p>
    </div>
    @else
        <ul class="list-group list-group-flush">
            @foreach ($notifications as $notification)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-1">
                            <img src="/images/user1.jpg" class="img-fluid rounded-circle"></img>
                        </div>
                        <div class="col-10">
                            <?php $date = new DateTime($notification->created_at);?>
                            @if($notification->post_id != NULL && $notification->item_id == NULL)
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->sender_id)->name }}</span> sent you a reply.</small>
                            <p class="card-text text-muted">
                                <a href="{{url('posts/'.$notification->post_id)}}" class="text-muted">{{ $notification->content }}</a>
                            </p>
                            @elseif($notification->post_id == NULL && $notification->item_id != NULL)
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->sender_id)->name }}</span> sent you a request.</small>
                            <p class="card-text text-muted">
                                <a href="{{url('items/'.$notification->item_id)}}" class="text-muted">{{ $notification->content }}</a>
                            </p>
                            @endif
                            
                            <p class="card-text text-muted"><small>{{ $date->format("g:i a, F j, Y")}}</small></p>
                        </div>
                        <div class="col-1">
                            {!! Form::open(['route' => ['notifications.destroy', 'notification_id'=>$notification->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                                @if(Auth::id() == $notification->user_id)
                                    {!! Form::button('<i class="fas fa-times"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                                @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </li>
            @endforeach
            {!! $notifications->render() !!}
        </ul>
    @endif
</div>