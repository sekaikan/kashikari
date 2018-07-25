<div class="">
       {!! Form::hidden('group_id', $group->id)!!}
    @if (Auth::user()->is_following($group->id))
        {!! Form::open(['route' => ['user.unfollow', $group->id], 'method' => 'delete', 'class'=>'']) !!}
        {!! Form::button('<h4>Leave <ion-icon name="log-out"></ion-icon></h4>', ['type'=> 'submit', 'class' => 'btn btn-blue']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $group->id], 'class'=>'']) !!}
        {!! Form::button('<h4>Join <ion-icon name="log-in"></ion-icon></h4>', ['type'=> 'submit', 'class' => 'btn btn-orange']) !!}
        {!! Form::close() !!}
    @endif
</div>
