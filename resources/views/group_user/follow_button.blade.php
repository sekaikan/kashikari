<div class="float-left">
       {!! Form::hidden('group_id', $group->id)!!}
    @if (Auth::user()->is_following($group->id))
        {!! Form::open(['route' => ['user.unfollow', $group->id], 'method' => 'delete', 'class'=>'text-left']) !!}
        {!! Form::button('Log out <ion-icon name="log-out"></ion-icon>', ['type'=> 'submit', 'class' => 'btn btn-link  btn-lg', 'style' => 'color: white;']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $group->id], 'class'=>'text-left']) !!}
        {!! Form::button('Log in <ion-icon name="log-in"></ion-icon>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary btn-lg']) !!}
        {!! Form::close() !!}
    @endif
</div>
