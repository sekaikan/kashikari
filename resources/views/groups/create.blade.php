@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class ="row pt-5">
        <div class="col-md-6 offset-md-3">
             <h2 class="text-center">Search Other Groups</h2>
                {!! Form::open(array('method' => 'Get', 'route' => 'groups.search')) !!}
                 <div class="form-group">
                    {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder'=>'Find Groups']) !!}
                </div>
                {!! Form::submit('Search', ['class' => 'btn btn-blue btn-lg btn-block']) !!}
                {!! Form::close() !!}
        </div>
    </div>
     <div class ="row pt-5">
        <div class="col-md-6 offset-md-3">
             <h2 class="text-center">Create New Group</h2>
             {!! Form::model($group, ['route' => 'group.store']) !!}
                 <div class="form-group">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Group Name']) !!}
                </div>
            {!! Form::submit('Create', ['class' => 'btn btn-blue btn-lg btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection