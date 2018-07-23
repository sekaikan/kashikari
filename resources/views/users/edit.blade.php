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
                <p>Your profile image will be set automatically via <a href="///unsplash.com">Unsplash</a> API.</p>
                <p>Current image: <a href="{{ $user->photo_link }}">Photo</a> by <a href="https://unsplash.com/{{ '@' . $user->photo_username }}?utm_source=kashikari&utm_medium=referral">{{ $user->photo_fullname }}</a></p>
                {!! Form::submit('Upload', ['class' => 'btn btn-block btn-blue mt-5']) !!}
            
            {!! Form::close() !!}
        </div>
    </div>
    @if(Auth::user()->id == $user->id)
        @include('users.delete_button')
    @endif
</div>
@endsection
