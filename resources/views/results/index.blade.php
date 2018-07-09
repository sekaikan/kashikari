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
            <div class="col-md-3">
                <div class="card">
                    <img class="card-img-top" src="{{ $item->photo }}" alt="Card image cap">
                    <div class="card-header">
                        {{ $item->name }} 
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $item->content }}</li>
                        <li class="list-group-item">{{ $item->status }}</li>
                        <li class="list-group-item">{{ $item->reward }}</li>
                        <li class="list-group-item">{{ $item->created_at }}</li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection