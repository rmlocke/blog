@extends('layouts.app')

@section('content')
<section>
    <div class="post preview">
        <h1 class="title">{{ $post->title }}</h1>
        <div class="content">
            {{ $post->content }}
        </div>
        <p class="post-meta">
            Posted by <a href="#">Name</a>
            <span class="post-date">at {{ $post->created_at->diffForHumans() }}</span>
        </p>
    </div>
</section>
@endsection