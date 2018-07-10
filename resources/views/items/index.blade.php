@extends('layouts.app')

@section('content')
<a href="items/create" class="btn btn-secondary btn-lg btn-block" role="button">Create !</a>
    @include('items.items', ['items' => $items])
@endsection