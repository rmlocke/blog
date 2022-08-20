@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Posts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $posts as $post )
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <a href="/posts/{{ $post->id }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at }}<td>
                        <td>
                            <a href="{{ route('posts.edit', $post) }}">Edit post</a>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
        </table>
        <a href="{{ route('posts.create') }}" class="btn btn-lg">Add post</a>
    </div>
</div>
@endsection