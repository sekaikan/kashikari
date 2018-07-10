@extends('layouts.app')

@section('content')
<div class="container">
    <div class ="row">
        <div class="col-md-6 offset-md-3">
             <h2>Create new Group</h2>
             {!! Form::model($group, ['route' => 'group.store']) !!}
                 <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            {!! Form::submit('Create', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection