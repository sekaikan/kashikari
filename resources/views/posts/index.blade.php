@extends('layouts.app')

@section('content')
<a href="posts/create" class="btn btn-secondary btn-lg btn-block" role="button">Create！</a>
    @include('posts.posts')
    <a href="/group" class="">back >></a>
@endsection

{!!$posts->render() !!}