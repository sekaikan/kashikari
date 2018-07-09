@extends('layouts.app')

@section('content')

{!! Form::open(['url' => '/upload', 'method' => 'post', 'files' => true]) !!}

<div class="form-group">
    @if ($item->photo)
        <p>
            <img src="{{ asset('storage/photo/' . $item->photo) }}" alt="avatar" />
        </p>
    @endif
    {!! Form::label('', '', ['class' => 'control-label']) !!}
    {!! Form::file('file') !!}
</div>

<div class="form-group">
      @if ($item->photo)
    {!! Form::submit('Update', ['class' => 'btn btn-light btn-sm']) !!}
    @else
     {!! Form::submit('Upload', ['class' => 'btn btn-light btn-sm']) !!}
    @endif
</div>
{!! Form::close() !!}

@endsection