@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1> 18 New grads </h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
<button type="button" class="btn btn-primary btn-lg btn-block"> <a href="/group/chat" class="btn btn-link text-info"><i class=""></i></a>chats</button>
<a href="{{ route ('items.index') }}" class="btn btn-primary btn-block">貸すよお</a>
<a href="{{ route ('posts.index') }}" class="btn btn-primary btn-block">貸して</a>
<button type="button" class="btn btn-primary btn-lg btn-block"><a href="/group/edit" class="btn btn-link text-info"><i class=""></i></a>Group EDIT</button>

@endsection