@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row pt-5">
    </div>
    <h1>{{$groups->count()}}
        @if($groups->count() == 1)
            group 
        @else
            groups 
        @endif
        found for "{{$keyword}}".</h1>
    <div class="row">
            @include('groups.groups')
    </div>
</div>
@endsection