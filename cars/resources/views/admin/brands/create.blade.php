@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>
        <form action="{{ route('admin.brands.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Brand Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection