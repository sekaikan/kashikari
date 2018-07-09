@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid bg-dark">
            <h1 class="text-center text-white">18 New Grads</h1>
    </div>
@endsection

@section('content')

<div class="btn-group">
    <a href="/groups/chats" class="btn btn-primary">Chats</a>
    <a href="/group/edit" class="btn btn-primary">Edit Groups</a>
</div>

<div>
    <h2 class="text-center">Let's share!!</h2>
    
    @include('items.items', ['items' => $items])
    
    <a href="{{ route ('items.index') }}" class="">More...</a>
</div>

<div>
    <h2 class="text-center">Please borrow</h2>

    @include('posts.posts', ['posts' => $posts])

    <a href="{{ route ('posts.index') }}" class="">More...</a>

</div>

@endsection