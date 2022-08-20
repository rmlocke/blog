@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ( $posts as $post )
                <div class="post preview">
                    <a href="/posts/{{ $post->id }}">
                        <h2 class="title">{{ $post->title }}</h2>
                    </a>
                    <div class="snippet">
                        {!! $post->content !!}
                    </div>
                    <p class="post-meta">
                        Posted by <a href="{{ route('users.show', $post->user)}}">{{ $post->user->name }}</a>
                        <span class="post-date">at {{ $post->created_at }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection