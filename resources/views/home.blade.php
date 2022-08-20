@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actions') }}</div>
                    <div class="card-body">
                        <ul>
                            <li><a href="/posts">Manage posts</a></li>
                            <li><a href="/users">Manage users</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('posts.upload')
@include('options.rss')
@endsection
