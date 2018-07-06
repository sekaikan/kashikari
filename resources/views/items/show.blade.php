@extends('layouts.app')

@section('content')
<div class="row">
            <div class= "col-lg-4 col-md-6 float-left">
                    <img class="card-img" src="{{ $item->photo }} {{ secure_asset("images/home1.jpg") }}" alt="" class="colorfilter-image">
              @if (Auth::check()) 
                       {!! Form::open(['route' => ['items.edit', $item->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="fas fa-pen-fancy"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                       {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                       {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                @endif
            </div>
            

        <div class="col-lg-8 col-md-6">
            <div class="card-groups">
                <div class="card">
                    <div class="card-header text-center">
                        {{ $item->name }}
                    </div>
                    <div class="card-body">
                        {{ $item->content }}
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Reward</p>
                        <p class="card-text">{{ $item->reward }}</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Status</p>
                        <p class="card-text">{{ $item->status}}</p>
                    </div>
                </div>
             </div>
                {!! Form::open(['route' => 'comments.store']) !!}
               <div class="form-group">
                    {{ Form::hidden('item_id', $item->id)}}
                   {!! Form::textarea('content', NULL, ['class' => 'form-control', 'id' => 'form-content', 'placeholder' => 'comment', 'rows' =>'3']) !!}
                   {!! Form::submit('send', ['class' => 'btn btn-primary btn-block', 'id' => 'form-button']) !!}
               </div>
                {!! Form::close() !!}
        
            @if (count($comments) >0)
            <?php $comments = $item->comments(); ?>
                  @include('comments.comments', ['comments' => $comments])
            @endif
        </div>    
</div>
@endsection