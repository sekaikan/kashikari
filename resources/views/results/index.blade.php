@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-5">
        <div class="mx-auto">
            <form class="form-inline" action="{{url('/results/')}}">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="入力してください">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($items as $item) 
            <div class="card col-md-4">
                <div class="card-header">
                    {{ $item->name }} 
                </div> 
                <div class="card-body">
                    <p class="card-text">{{ $item->content }}</p>
                    <p class="card-text">{{ $item->status }}</p>
                    <p class="card-text">{{ $item->reward }}</p>
                    <p class="card-text">{{ $item->created_at }}</p>        
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection