<?php $notifications = \DB::table('notifications')->where('recipient_id', \Auth::id())->orderBy('created_at', 'asc')->paginate(5); ?>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-11">
                <i class="far fa-bell"></i> Notification
                @if($notifications->count()>0)
                    <a data-toggle="collapse" href="#collapsePost" aria-expanded="false" aria-controls="collapseExample">
                        <span class="badge badge-pill badge-danger">
                        {{ Auth::user()->notifications()->count() }}
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
                 <?php $image_rand2 = array(
                                "images/user2.jpg",
                                "images/user3.jpg",
                                "images/user4.jpg", 
                                "images/user5.jpg", 
                              );
                        $image_rand2 = $image_rand2[mt_rand(0, count($image_rand2)-1)];
                 ?>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-1">
                            <img src="{{ secure_asset($image_rand2)}}" class="img-fluid rounded-circle"></img>
                        </div>
                        <div class="col-9">
                            <?php $date = new DateTime($notification->created_at);?>
                            @if($notification->post_id != NULL && $notification->item_id == NULL)
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->user_id)->name }}</span> sent you a reply.</small>
                            <p class="card-text text-muted">
                                <a href="{{url('posts/'.$notification->post_id)}}" class="text-muted">{{ $notification->content }}</a>
                            </p>
                            @elseif(($notification->post_id == NULL && $notification->item_id != NULL) && ($notification->type == 'toItem' || $notification->type == 'toComment') )
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->user_id)->name }}</span> commented.</small>
                            <p class="card-text text-muted">
                                <a href="{{url('items/'.$notification->item_id)}}" class="text-muted">{{ $notification->content }}</a>
                            </p>
                            @elseif($notification->post_id == NULL && $notification->item_id != NULL )
                            <small class="card-title"><span class="font-weight-bold">{{ App\User::find($notification->user_id)->name }}</span> sent you a request.</small>
                            <p class="card-text text-muted">
                                <a href="{{url('items/'.$notification->item_id)}}" class="text-muted">{{ $notification->content }}</a>
                            </p>
                            @endif
                            
                            <p class="card-text text-muted"><small>{{ $date->format("G:i, F j, Y")}}</small></p>
                        </div>
                        <div class="col-2">
                            {!! Form::open(['route' => ['notifications.destroy', 'notification_id'=>$notification->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                                @if(Auth::id() == $notification->user_id)
                                    {!! Form::button('<i class="fas fa-times"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}

                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
                {!! $notifications->render() !!}
            </ul>
        </div>
    @endif
</div>