@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="post">
                <h1 class="title">{{ $post->title }}</h1>
                <div class="content">
                    {!! $post->content !!}
                </div>
                <p class="post-meta">
                    Posted by <a href="{{ route('users.show', $post->user)}}">{{ $post->user->name }}</a>
                    <span class="post-date">at {{ $post->created_at }}</span>
                </p>
            </div>
            <div class="comments">
                <h2>Comments</h2>
                @foreach ($post->comments as $comment)
                    <div class="comment">
                        {!! $comment->content !!}
                        <p>
                            <span class="meta">by {{ $comment->author }}</span>
                        </p>
                    </div>
                @endforeach
                @include('comments.create')
            </div>
        </div>
    </div>
</div>
@endsection