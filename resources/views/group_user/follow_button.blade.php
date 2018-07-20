<div class="float-left">
       {!! Form::hidden('group_id', $group->id)!!}
    @if (Auth::user()->is_following($group->id))
        {!! Form::open(['route' => ['user.unfollow', $group->id], 'method' => 'delete', 'class'=>'']) !!}
        {!! Form::button('<h3>Leave <ion-icon name="log-out"></ion-icon></h3>', ['type'=> 'submit', 'class' => 'btn btn-blue btn-lg']) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['user.follow', $group->id], 'class'=>'']) !!}
        {!! Form::button('<h3>Join <ion-icon name="log-in"></ion-icon></h3>', ['type'=> 'submit', 'class' => 'btn btn-orange btn-lg']) !!}
        {!! Form::close() !!}
    @endif
</div>
