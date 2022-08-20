@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <a href="{{ route('posts.create') }}" class="btn-link btn-lg">+ Add post</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>
                    <a href="/posts">Edit posts</a><br>
                    <a href="">Upload RSS/CSV</a>
                    <a href="/users">Edit users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
