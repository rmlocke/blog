@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>

        <h1>All users</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>     
        @foreach ( $users as $user )
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}">Edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <a href="{{ route('users.create') }}" class="btn btn-lg btn-primary">Add user</a>
    </div>
</div>
@endsection