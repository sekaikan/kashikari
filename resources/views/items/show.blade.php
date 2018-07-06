@extends('layouts.app')

@section('content')
<div class="row">
            <div class= "col-lg-4 col-md-6 float-left">
                    <img class="card-img" src="{{ $item->photo }} {{ secure_asset("images/home1.jpg") }}" alt="" class="colorfilter-image">
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
                @if (Auth::check()) 
                       {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete', 'class'=>'text-right']) !!}
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type'=> 'submit', 'class' => 'btn btn-link text-secondary']) !!}
                       {!! Form::close() !!}
                @endif
        
        </div>
</div>
@endsection