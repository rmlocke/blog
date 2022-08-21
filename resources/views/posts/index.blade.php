@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Posts</li>
            </ol>
        </nav>

        <div class="clearfix">
            <div class="float-start">
            <h1>Posts</h1>
            </div>
            <div class="float-end">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-primary float-end">Add post</a>
            </div>
        </div>

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

        {!! $posts->links() !!}

    </div>
</div>
@endsection