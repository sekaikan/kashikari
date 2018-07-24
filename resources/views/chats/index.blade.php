@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center pt-5">Group Chat</h2>
        {!! Form::open(array('route' => array('chats.store', $group->id),'class'=>'col-4 offset-4')) !!}
            <div class="row">
            {{ Form::hidden('group_id', $group->id)}}
            {!! Form::text('content', NULL, ['class' => 'form-control col-10', 'id' => 'bms_send_message', 'placeholder' => 'What\'s up?']) !!}
            {{ Form::submit('&#xf1d8;', ['class' => 'btn far col-2','id'=>'bms_send_btn']) }}
            </div>
        {!! Form::close() !!}
</div>
<div class="container">
    @if (count($chats) >0)
        @include('chats.chats')
    @endif
</div>
@endsection