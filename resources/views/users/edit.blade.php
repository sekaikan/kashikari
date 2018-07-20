@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row py-5">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Edit Profile</h2>
            {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Self introduction') !!}
                    {!! Form::text('content', $user->content, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Upload', ['class' => 'btn btn-block btn-blue mt-5']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
