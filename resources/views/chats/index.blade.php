@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="col-md-6 offset-md-3">
            {!! Form::open(['route' => 'chats.store']) !!}
                <div class="form-group">
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