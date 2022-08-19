@extends('layouts.app')

@section('content')
<section>
    <h2>All users</h2>
    @foreach ( $users as $user )
        <div class="user preview">
            <a href="/users/{{ $user->id }}">
                <h2 class="title">{{ $user->name }}</h2>
            </a>
        </div>
    @endforeach  
</section>
@endsection