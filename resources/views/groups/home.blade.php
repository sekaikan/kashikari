@extends('layouts.app')

@section('cover')
    <div class="jumbotron jumbotron-fluid">
            <h1 class="text-center">18 New Grads</h1>
    </div>
@endsection

@section('content')
<a href="/group/chats" class="btn btn-primary btn-block">Chats</a>
<a href="{{ route ('items.index') }}" class="btn btn-primary btn-block">貸すよお</a>
<a href="{{ route ('posts.index') }}" class="btn btn-primary btn-block">貸して</a>
<a href="/group/edit" class="btn btn-primary btn-block">Edit Groups</a>

@endsection