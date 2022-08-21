@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Upload result</li>
            </ol>
        </nav>

        <h1>Upload results</h1>

        @foreach ($result as $key => $value)
            {{ $key }} {{ $value }}
        @endforeach
    </div>
</div>
@endsection