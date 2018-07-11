@extends('layouts.app')

@section('content')
<div class="container">
    <a href="items/create" class="btn btn-secondary btn-lg btn-block" role="button">Create !</a>
    
    @include('items.items', ['items' => $items])
    
</div>
@endsection