@extends('layouts/base')

@section('content')
    @foreach ( $posts as $post )
        <div class="post">
            {{ $post->title }}
            <p>{{ $post->content }}</p>
        </div>
    @endforeach       
@endsection
