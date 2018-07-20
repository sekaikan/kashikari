@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center pt-5">Group Chat</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            {!! Form::open(array('route' => array('chats.store', $group->id))) !!}
                <div class="form-group">
                    {{ Form::hidden('group_id', $group->id)}}
                    {!! Form::textarea('content', NULL, ['class' => 'form-control', 'id' => 'form-content', 'placeholder' => 'What\'s up?', 'rows' =>'3']) !!}
                    {!! Form::submit('send', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="container">
    @if (count($chats) >0)
        @include('chats.chats')
    @endif
</div>
@endsection