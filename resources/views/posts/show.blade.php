@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p>Post ID: {{ $post->id }}</p>
                    <p>{{ $post->content }}</p>
                    <p>Status: {{ $post->status}}</p>
                    <p class="text-muted">by {{ $post->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
    @if (\Auth::user())
    {!! Form::open(['route' => 'replies.store']) !!}
        <div class="form-group" id="review-form-group">
            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...', 'rows'=>2]) !!}
            {!! Form::submit('Reply', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
            {{Form::hidden('post_id', $post->id)}}
        </div>
        {!! Form::close() !!}
    @endif

    <?php $replies = $post->replies()->where('reply_id', NULL)->paginate(100); ?>
    @include('replies.replies')
       
       <a href="/group" class="">back >></a>
</div>

@endsection

