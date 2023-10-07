@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <div class="d-flex justify-content-between my-2">
        <a href="/admin/categories" class="btn btn-secondary">Go Back</a>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" readonly>
    </div>
</div>
@endsection
