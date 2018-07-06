@extends('layouts.app')

@section('content')
<div class="bg-white py-5" id="form-bg" style= margin-top:30px;>
    <div class="container">
        @if (Auth::id() == $user->id)
        {!! Form::open(['route' => 'posts.store']) !!}
            <div class="form-group p-2" id="review-form-group">
                <hr>
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'感想をご記入ください。']) !!}
               
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection