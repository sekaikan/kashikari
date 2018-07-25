<?php $notifications = \DB::table('notifications')->where('recipient_id', \Auth::id())->orderBy('created_at', 'asc')->paginate(5); ?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-11">
                <i class="far fa-bell"></i> Notification
                @if($notifications->count()>0)
                    <a data-toggle="collapse" href="#collapsePost" aria-expanded="false" aria-controls="collapseExample">
                        <span class="badge badge-pill badge-warning">
                        {{ $notifications->count() }}
                        </span>
                    </a>
                @endif
            </div>
                <a class="text-dark" data-toggle="collapse" href="#collapsePost" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-angle-down"></i>
                </a>
        </div>
    </div>
    @if($notifications->count()==0)
        <div class="card-body collapse" id="collapsePost">
            <p class="card-text text-muted"><i class="far fa-thumbs-up"></i> You have no new notifications.</p>
        </div>
    @else

        <div class="card-body collapse" id="collapsePost">
                {!! Form::open(['route' => ['notifications.purge', 'user_id'=>Auth::id()], 'method' => 'delete', 'class'=>'text-right']) !!}
                {!! Form::button('<i class="fas fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                {!! Form::close() !!}
        <ul class="list-group list-group-flush">
             @foreach ($notifications as $notification)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{ App\User::find($notification->user_id)->photo }}" class="usericon"></img>
                        </div>
                        <div class="col-9">
                            <?php $date = new DateTime($notification->created_at);?>
                            @if($notification->post_id != NULL && $notification->item_id == NULL)
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->user_id)->name }}</span> sent you a reply.</small>
                            <p class="card-text text-muted">
                                {!! link_to_route('notifications.open_delete', $notification->content,['notification_id'=>$notification->id,'post_id'=> $notification->post_id, 'type'=>'toPost']) !!}
                            </p>
                            @elseif(($notification->post_id == NULL && $notification->item_id != NULL) && ($notification->type == 'toItem' || $notification->type == 'toComment') )
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->user_id)->name }}</span> commented.</small>
                            <p class="card-text text-muted">
                                {!! link_to_route('notifications.open_delete', $notification->content,['notification_id'=>$notification->id,'item_id'=> $notification->item_id, 'type'=>'toItem']) !!}
                            </p>
                            @elseif($notification->post_id == NULL && $notification->item_id != NULL )
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->user_id)->name }}</span> sent you a request.</small>
                            <p class="card-text text-muted">
                                {!! link_to_route('notifications.open_delete', $notification->content,['notification_id'=>$notification->id,'item_id'=> $notification->item_id, 'type'=>'toItem']) !!}
                            </p>
                            @endif
                            
                            <p class="card-text text-muted"><small>{{ $date->format("G:i, F j, Y")}}</small></p>
                        </div>
                        <div class="col-2">
                            {!! Form::open(['route' => ['notifications.destroy', 'notification_id'=>$notification->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                            @if(Auth::id() == $notification->recipient_id)
                            {!! Form::button('<i class="fas fa-times"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                            @endif
                            {!! Form::close() !!}
                            </div>
                        </div>
                    </li>
                @endforeach
                {!! $notifications->render() !!}
            </ul>
        </div>
    @endif
</div>