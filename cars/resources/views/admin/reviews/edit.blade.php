@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>Edit Review</h1>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left"></i>
            <span class="">Back</span>
        </a>
    </div>

    <form action="{{ route('admin.reviews.update', $review->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user">User:</label>
            <input type="text" id="user" class="form-control" value="{{ $review->user->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="car">Car:</label>
            <input type="text" id="car" class="form-control" value="{{ $review->car->make }} {{ $review->car->model }}"
                readonly>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" class="form-control" rows="5">{{ $review->comment }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Review</button>
    </form>
</div>
@endsection
