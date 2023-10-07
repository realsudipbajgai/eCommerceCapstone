@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Brand</h1>
        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection