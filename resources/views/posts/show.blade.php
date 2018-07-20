@extends('layouts.app')


@section('content')


<div class="container my-5">
    <div class="row py-5">
        <div class="col-6 offset-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 col-2">
                           <img src="{{ Gravatar::src($post->user->email, 1000) . '&d=mm' }}" alt="" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-md-8 col-8 px-0">
                            {!! link_to_route('users.show', $post->user->name, ['id' => $post->user->id]) !!}<small> <span class="text-muted">at {{ $post->created_at }}</span>
                            </small>
                        </div>
                        <div class="col-md-2 col-2 text-right">
                                @if (Auth::id() == $post->user_id)
                                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                                    {!! Form::close() !!}
                                @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 offset-md-2 col-7 offset-2 px-0">
                            <p class="card-text">{!! nl2br(e($post->content)) !!}</p>
                        </div>
                        <!--div class="col-md-3 col-3 text-right align-self-end">
                            {!! link_to_route('posts.show','Reply', ['id' => $post->id], ['class'=>'btn btn-blue btn-sm']) !!}
                        </div-->
                    </div>
                </div>
            </div>
                @if (\Auth::user())
                {!! Form::open(['route' => 'replies.store']) !!}
                    <div class="form-group mt-5" id="review-form-group">
                        {!! Form::textarea('content', '', ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'Reply...', 'rows'=>2]) !!}
                        {{ Form::hidden('post_id', $post->id) }}
                        {!! Form::submit('Reply', ['class' => 'btn btn-blue btn-block', 'id' => 'form-button']) !!}
                    </div>
                    {!! Form::close() !!}
                @endif
            
                <?php $replies = $post->replies()->where('reply_id', NULL)->paginate(100); ?>
                @include('replies.replies')
        </div>
    </div>
   <a href="/group/{{$group->id}}/posts/index" class="btn btn-link">&laquo; Back</a>
</div>

@endsection

