@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
            <div class= "col-lg-4 col-md-6 float-left">
                    <img class="card-img" src="{{ $item->photo }}" alt="" class="colorfilter-image">
            </div>
            

        <div class="col-lg-8 col-md-6">
            <h1>{{$item->name}}</h1>
            <p> {!! nl2br(e($item->content)) !!}</p>
            <hr>
              <p class="card-text h5"><i class="fas fa-gift mr-2"></i>{{ $item->reward }}</p>
            
                
               
            <div class="row offset-9">
              @if (Auth::check()) 
                       {!! Form::open(['route' => ['items.edit', $item->id], 'method' => 'get', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="fas fa-pen-fancy"></i><span style="margin-left:5px;">Edit</span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                       {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="far fa-trash-alt"></i><span style="margin-left:5px;">Delete</span>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
                <div class="row">
                    <div class="col-12">
                        {!! Form::open(['route' => 'comments.store']) !!}
                       <div class="form-group mt-5">
                           {{ Form::hidden('item_id', $item->id)}}
                           {!! Form::textarea('content', NULL, ['class' => 'form-control', 'id' => 'form-content', 'placeholder' => 'Message...', 'rows' =>'3']) !!}
                           {!! Form::submit('Send', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <?php $comments = $item->comments()->where('parent_id', NULL); ?>
                    @if (count($comments) >0)
                          @include('comments.comments', ['comments' => $comments])
                    @endif
                <a href="/group" class="">back >></a>
        </div>

@endsection