@extends('layouts.app')

@section('content')
<div class="container my-5">
    @if(Auth::id() == $item->want_user_id)
      <div class="alert alert-info mt-5 pt-5" role="alert">
          <i class="fas fa-check mr-3"></i>Your request was completed! Let's chat now!!
      </div>
    @endif
    <div class="row bg-white pb-4">

        <div class= "pt-5 col-6">
            <div class="ribbon_box3">
                <img class="card-img" src="{{ $item->photo }}" alt="" class="colorfilter-image">
                <div class="ribbon_area">
                    @if($item->status == 'open')
                       <span class="ribbon16">{{ $item->status }}</span>
                    @else
                        <span class="ribbon17">{{ $item->status }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class=" pt-5 col-6 title-space">
            <h1>{{$item->name}}</h1>
            <p>by {{$item->user->name}}</p>
            <p class="conte-space"> {!! nl2br(e($item->content)) !!}</p>
            <hr>
                @if($item->reward != NULL)
                <p class="card-text h5"><i class="fas fa-gift mr-2"></i>  {{ $item->reward }}<span style="margin-left:5px;"><span class="text-muted h6">in return</span></p>
                @else
                <p class="card-text h5"><i class="fas fa-gift mr-2"></i>  Ask me !</p>
                @endif
            <div class="row">
                <div class="offset-6 col-2">
                    @if (Auth::id() == $item->user->id) 
                       {!! Form::open(['route' => ['items.edit', $item->id], 'method' => 'get', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="fas fa-pen-fancy"></i><span style="margin-left:5px;">Edit</span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                </div>
                <div class="col-3">
                       {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="far fa-trash-alt"></i><span style="margin-left:5px;">Delete</span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                    @endif
                </div>
            </div>
            <div class="borrow-button">
                @if(Auth::id() != $item->user->id && $item->want_user_id==NULL && $item->status == "open" )
                {!! Form::open(['route' => ['want', $item->id], 'method' => 'put']) !!}
                    {{ Form::hidden('want_user_id', \Auth::id()) }}
                    {!! Form::submit('Request to rent', ['class' => 'btn btn-orange btn-block btn-lg', 'id' => 'form-button']) !!}
                {!! Form::close() !!}
                
                @elseif(Auth::id() == $item->want_user_id && $item->status == "closed")
                {!! Form::open(['route' => ['want', $item->id], 'method' => 'put']) !!}
                    {{ Form::hidden('want_user_id', \Auth::id()) }}
                    {!! Form::submit('Please wait for reply (Click to cancel).', ['class' => 'btn btn-blue btn-block btn-lg', 'id' => 'form-button']) !!}
                {!! Form::close() !!}
                    <!--a href="#" class="btn btn-blue btn-block btn-lg" role="button" aria-pressed="true">Please wait for reply</a-->
                
                @elseif(Auth::id() != $item->user->id && Auth::id() != $item->want_user_id )
                    <button class="btn btn-blue btn-block pt-2" style="pointer-events: none;"><h5>Already rented</h5></button>
                @endif
            </div>
        </div>
    </div>
        <a href="/group/{{$item->group_id}}" class=""><i class="fas fa-angle-double-left fa-fw"></i>back to home</a>
        @if(Auth::id() == $item->want_user_id || Auth::id() == $item->user->id)
         <div class="row">
                    <div class="col-10 offset-1">
                        {!! Form::open(['route' => 'comments.store', 'method' => 'post']) !!}
                       <div class="form-group mt-5">
                           {{ Form::hidden('item_id', $item->id)}}
                           {!! Form::textarea('content', NULL, ['class' => 'form-control', 'id' => 'form-content', 'placeholder' => 'Message...', 'rows' =>'3']) !!}
                           {!! Form::submit('Send', ['class' => 'btn btn-blue btn-block ', 'id' => 'form-button']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <?php $comments = $item->comments()->where('parent_id', NULL); ?>
                    @if (count($comments) >0)
                    <div class="offset-2 col-8">
                         @include('comments.comments', ['comments' => $comments])
                    </div>
                    @endif
        </div>
        @endif

        

@endsection