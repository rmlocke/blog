@extends('layouts.app')

@section('content')
<section>
    <h2>All users</h2>
    @foreach ( $users as $user )
        <div class="user preview">
            <h2 class="title">{{ $user->name }}</h2>
            <a href="{{ route('users.edit', $user) }}">Edit user</a>
        </div>
    @endforeach
    <a href="{{ route('users.create') }}" class="btn-link btn-lg">Add user</a>
</section>
@endsection