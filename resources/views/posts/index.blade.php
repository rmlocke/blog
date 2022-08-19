@extends('layouts.app')

@section('content')
<section>
    <h2>All posts</h2>
    @foreach ( $posts as $post )
        <!-- Post preview-->
        <div class="post preview">
            <a href="/posts/{{ $post->id }}">
                <h2 class="title">{{ $post->title }}</h2>
            </a>
            <div class="snippet">
                {{ $post->content }}
            </div>
            <p class="post-meta">
                Posted by <a href="#">Name</a>
                <span class="post-date">at {{ $post->created_at->diffForHumans() }}</span>
            </p>
        </div>
    @endforeach  
</section>
@endsection