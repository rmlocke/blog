@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>All users</h2>
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
        <a href="{{ route('users.create') }}" class="btn btn-lg">Add user</a>
    </div>
</div>
@endsection