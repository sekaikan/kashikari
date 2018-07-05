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
<button type="button" class="btn btn-primary btn-lg btn-block"> <a href="/group/chat" class="btn btn-link text-info"><i class="fas fa-shopping-cart"></i></a>chats</button>
<button type="button" class="btn btn-primary btn-lg btn-block"><a href="/group/lend" class="btn btn-link text-info"><i class="fas fa-shopping-cart"></i></a>貸すよ～</button>
<button type="button" class="btn btn-primary btn-lg btn-block"><a href="/group/borrow" class="btn btn-link text-info"><i class="fas fa-shopping-cart"></i></a>借りたいよお～</button>
<button type="button" class="btn btn-primary btn-lg btn-block"><a href="/group/edit" class="btn btn-link text-info"><i class="fas fa-shopping-cart"></i></a>Group EDIT</button>

@endsection