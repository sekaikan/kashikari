@extends('layouts.app')

@section('cover')
     <div class="jumbotron jumbotron-home">
            <h1 class="text-center text-white mt-5">{!! $group->name !!}</h1>
            <div class="col-3 mx-auto">
                <div class="mx-auto">
                    @if (isset($groupusers))
                        @foreach($groupusers as $key => $groupuser)
                            <img class="usericon" src="{{ $groupuser->photo }}">
                        @endforeach
                    @endif
                    <a href="{{route('group.userlist', ['id' => $group->id]) }}" class="lasticon"><i class="fas fa-ellipsis-h text-light"></i></a> 
                </div>
            </div>
            
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="mainmenu status sen text-center">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item col-4 px-0">
                    <a class="nav-link" href="/group/{{$group->id}}"><i class="fas fa-home"></i><br>Home</a>
                </li>
                <li class="nav-item col-4 px-0">
                    <a href="{{ route('posts.borrow', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-hand-holding-heart"></i><br>Borrow</a>
                </li>
                <li class="nav-item col-4 px-0">
                    <a href="{{ route('items.lend', ['id' => $group->id]) }}" class="nav-link"><i class="fas fa-people-carry"></i><br>Lend</a>
                </li>
            </ul>
        </div>

        <div class="container pt-5 bg-light">
            <div class="row">
                <div class= "offset-3 col-6">
                    @if (Auth::id() == $user->id)
                    {!! Form::open(array('route' => array('posts.store', $group->id),'id' => 'content-content')) !!}
                        <div class="form-group" id="review-form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'id'=>'form-content', 'placeholder'=>'What do you need ?', 'rows'=>'3']) !!}
                            {{ Form::hidden('group_id', $group->id)}}
                            {!! Form::submit('submit',['class' => 'btn btn-blue btn-block', 'id' => 'form-button']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </div>
                <div class="offset-3 col-6">
                    <div class="pb-5">
                        <h2 class="text-center under mt-3">Posted Messages</h2>
                         @include('posts.posts', ['posts' => $posts])
                    </div>
                </div>

            </div>
        <!--<a href="/group" class="">back >></a>-->
        </div>
    </div>
@endsection

{!!$posts->render() !!}