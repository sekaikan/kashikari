@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="mx-auto">
            <h2 class="text-center my-3">Your account was deleted successfully</h2>
            <img src="/images/Thankyou.jpg">
        </div>
    </div>
    <div class="mx-auto my-5 text-center">
        <a href="{{ route('welcome') }}"><i class="fas fa-home fa-3x"></i></br>Home</a>
    </div>
</div>
@endsection
