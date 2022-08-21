@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
            </ol>
        </nav>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('posts.update', $post) }}">
                        @method('put')
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-2 col-form-label text-md-end">{{ __('Title') }}</label>

                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('email') is-invalid @enderror" name="title" value="{{ @old('title', $post->title) }}" required>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="content" class="col-md-2 col-form-label text-md-end">{{ __('Content') }}</label>

                            <div class="col-md-10">
                                <textarea id="content" class="form-control editor @error('content') is-invalid @enderror" name="content" required>{{ @old('content', $post->content) }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection