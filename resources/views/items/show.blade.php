@extends('layouts.app')

@section('content')
<div class="container my-5">
    @if(Auth::id() == $item->want_user_id)
      <div class="alert alert-success mt-5 pt-5" role="alert">
          <i class="fas fa-check mr-3"　style="color:red;"></i>Your request was completed! Let's chat now!!
      </div>
    @endif
    <div class="row">

        <div class= "pt-5 col-6 float-left">
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
              <p class="card-text h5"><i class="fas fa-gift mr-2"></i>{{ $item->reward }}<span style="margin-left:5px;"><span class="text-muted">in return</span></p>

            <div class="row offset-8">
              @if (Auth::id() == $item->user->id) 

                       {!! Form::open(['route' => ['items.edit', $item->id], 'method' => 'get', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="fas fa-pen-fancy"></i><span style="margin-left:5px;">Edit</span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                       {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="far fa-trash-alt"></i><span style="margin-left:5px;">Delete</span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
              @endif
            </div>
            <div class="borrow-button">
                @if(Auth::id() != $item->user->id && Auth::id() != $item->want_user_id )
                {!! Form::open(['route' => ['want', $item->id], 'method' => 'put']) !!}
                    {{ Form::hidden('want_user_id', \Auth::id()) }}
                    {!! Form::submit('Please lend it', ['class' => 'btn btn-danger btn-block btn-lg', 'id' => 'form-button']) !!}
                {!! Form::close() !!}
                
                @elseif(Auth::id() == $item->want_user_id )
                {!! Form::open(['route' => ['want', $item->id], 'method' => 'put']) !!}
                    {{ Form::hidden('want_user_id', \Auth::id()) }}
                    <a href="#" class="btn btn-success btn-block btn-lg" role="button" aria-pressed="true">Please wait for reply</a>
                @endif
            </div>
        </div>
    </div>
<a href="/group/{{$item->group_id}}" class="">&laquo;back</a>
        @if(Auth::id() == $item->want_user_id)
         <div class="row">
                    <div class="col-6 offset-3">
                        {!! Form::open(['route' => 'comments.store', 'method' => 'post']) !!}
                       <div class="form-group mt-5">
                           {{ Form::hidden('item_id', $item->id)}}
                           {!! Form::textarea('content', '', ['class' => 'form-control', 'id' => 'form-content', 'placeholder' => 'Message...', 'rows' =>'3']) !!}
                           {!! Form::submit('Send', ['class' => 'btn btn-primary btn-block ', 'id' => 'form-button']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <?php $comments = $item->comments()->where('parent_id', NULL); ?>
                    @if (count($comments) >0)
                          @include('comments.comments', ['comments' => $comments])
                    @endif
                
        </div>
        @endif

        

@endsection