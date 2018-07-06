@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="card col-md-6 offset-md-3">
            <p>{{ $post->content }}</p>
            <p>Status: {{ $post->status}}</p>
            <p class="text-muted">by {{ $post->user->name }}</p>
        </div>
    </div>
</div>
        @if (Auth::id() == $post->user->id)
        {!! Form::open(['route' => 'replies.store']) !!}
            <div class="form-group" id="review-form-group">
                {{ Form::select('status', array('open' => 'Open', 'closed' => 'Closed'), 'open', ['class'=>'form-control']) }}
                {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'貸してください']) !!}
                {!! Form::submit('投稿する', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
                {{Form::hidden('post_id', $post->id)}}
            </div>
            {!! Form::close() !!}
        @endif
        
        <?php $replies = $post->replies()->paginate(100); ?>
       @include('replies.replies')
@endsection
{!! $replies->render() !!}
