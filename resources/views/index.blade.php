@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (count($posts))
                @foreach ( $posts as $post )
                    <div class="post preview">
                        <a href="/posts/{{ $post->id }}">
                            <h2 class="title">{{ $post->title }}</h2>
                        </a>
                        <div class="snippet">
                            {!! $post->content !!}
                        </div>
                        <p class="post-meta">
                            @if(isset($post->user))
                            Posted by <a href="{{ route('users.show', $post->user)}}">{{ $post->user->name }}</a>
                            @endif
                            <span class="post-date">at {{ $post->created_at }}</span>
                        </p>
                    </div>
                @endforeach

                {!! $posts->links() !!}
            @else
                <p>We currently have no posts.</p>
            @endif

        </div>
    </div>
</div>
@endsection