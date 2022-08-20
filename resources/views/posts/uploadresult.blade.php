@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Upload results</h2>

        @foreach ($result as $key => $value)
            {{ $key }} {{ $value }}
        @endforeach
    </div>
</div>
@endsection