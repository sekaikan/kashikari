@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pt-5">
        <!--div class="mx-auto">
            <form class="form-inline" action="{{url('/results/')}}">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{$keyword}}" class="form-control" placeholder="入力してください">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div-->
    </div>
    <h1>{{$items->count()}}
        @if($items->count() == 1)
            Item 
        @else
            Items 
        @endif
        found for "{{$keyword}}".</h1>
    <div class="row">
        @foreach($items as $item)
            @include('items.items')
        @endforeach
    </div>
</div>
@endsection