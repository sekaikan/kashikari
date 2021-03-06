
@extends('layouts.app')

@section('content')

<div class="container">
     {!! Form::model($item,['route' => ['items.update', $item->id], 'method' => 'put']) !!}
        <div class="row">
             <div class="col-md-6 offset-md-3">
                 <h1 class="text-center font-weight-light">Register Items</h1>
                 <div class="text-center">
                  <img src="{{ $item->photo }}" class="">
                 </div>
                 <div class="form-group">
                    {!! Form::label('name', 'Item name') !!}
                    {!! Form::text('name', $item->name, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Description') !!}
                    {!! Form::textarea('content', $item->content, ['class' => 'form-control', 'rows' => '5']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reward', 'Reward') !!}
                    {!! Form::text('reward', $item->reward, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status</label>
                      <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="open" selected>Open</option>
                            <option value="closed">closed</option>
                      </select>
                </div>
                <ul class="my-4">
                    <li class="text-muted small">Item image is set automatically via <a href="///unsplash.com">Unsplash</a> API.</li>
                    <li class="text-muted small">Current image: <a href="{{ $item->photo_link }}">Photo</a> by <a href="https://unsplash.com/{{ '@' . $item->photo_username }}?utm_source=kashikari&utm_medium=referral">{{ $item->photo_fullname }}</a></li>
                </ul>
                {!! Form::submit('upload', ['class' => 'btn btn-blue btn-block']) !!}
                {!! Form::close() !!}
              </div>
        </div>
</div>
@endsection