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
                    {!! Form::label('name', 'アイテム名') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '説明文') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reward', '報酬') !!}
                    {!! Form::text('reward', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                <button type="button" class="btn btn-success btn-lg">募集中</button>
                <button type="button" class="btn btn-danger btn-lg">貸出中</button>
                
              </div>
            {!! Form::submit('upload', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
              
            {!! Form::close() !!}
            
        </div>
</div>
@endsection