@extends('layouts.app')

@section('content')
<div class="bg-white py-5" id="form-bg">
    <div class="container">
        @if (Auth::id() == $user->id)
        {!! Form::open(['route' => 'replies.store']) !!}
            <div class="form-group" id="review-form-group">
                {{ Form::select('status', array('open' => 'Open', 'closed' => 'Closed'), 'open', ['class'=>'form-control']) }}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'貸してください']) !!}
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection