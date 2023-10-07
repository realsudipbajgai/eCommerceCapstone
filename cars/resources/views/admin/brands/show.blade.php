@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Brand Detail</h1>
        <p><strong>ID:</strong> {{ $brand->id }}</p>
        <p><strong>Brand Name:</strong> {{ $brand->name }}</p>
    </div>
@endsection