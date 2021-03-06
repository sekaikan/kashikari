@extends('layouts.app')

@section('content')
<div class="bg-white py-5" id="form-bg">
    <div class="container">
        <h2>Replies Create</h2>
        <p>You are replying to {{ $reply->id }}.</p>
        
        @if (Auth::id() == $user->id)
        {!! Form::open(['route' => 'replies.store']) !!}
            <div class="form-group" id="review-form-group">
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...']) !!}
                {{ Form::hidden('post_id', $reply->post_id) }}
                {{ Form::hidden('reply_id', $reply->id) }}
                {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            </div>
            {!! Form::close() !!}
        @endif
    </div>
</div>
@endsection