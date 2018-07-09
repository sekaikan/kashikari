@extends('layouts.app')

@section('content')
    @include('posts.posts')
    <a href="/group" class="">back >></a>
@endsection

{!!$posts->render() !!}