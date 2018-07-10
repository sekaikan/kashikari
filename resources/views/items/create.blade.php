@extends('layouts.app')

@section('content')

<div class="container">
     {!! Form::model($item, ['route' => 'items.store']) !!}
        <div class="row">
             <div class="col-md-6 offset-md-3">
                <h1 class="text-center font-weight-light">アイテム登録ページ</h1>
                <div class="text-center">
                <img src="{{ $item->photo }}" class="">
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', 'Explanation') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reward', 'Return') !!}
                    {!! Form::text('reward', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                     <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Status</label>
                      <select name="status" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                            <option value="open" selected>Open</option>
                            <option value="closed">closed</option>
                      </select>
                </div>
               
              </div>
            {!! Form::submit('upload', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
              
            {!! Form::close() !!}
            
        </div>
</div>
@endsection