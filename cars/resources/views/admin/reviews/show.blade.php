@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>Review Detail</h1>
        <a href="{{ route('admin.reviews.index') }}" class="btn btn-outline-secondary mt-3">
            <i class="bi bi-arrow-left"></i>
            <span class="">Back</span>
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="user">User:</label>
                <input type="text" id="user" class="form-control" value="{{ $review->user->first_name }} {{ $review->user->last_name }}" readonly>
            </div>
            <div class="form-group">
                <label for="car">Car:</label>
                <input type="text" id="car" class="form-control" value="{{ $review->car->make }} {{ $review->car->model }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea id="comment" class="form-control" rows="5" readonly>{{ $review->comment }}</textarea>
            </div>
        </div>
    </div>
</div>
@endsection
 