@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{ $title }}</h1>
        <form class="d-flex mt-3" role="search" action="/admin/reviews/search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search"
                aria-label="Search" name="search">
            <button class="btn btn-outline-success"
                type="submit">Search</button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Car</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <th scope="row">{{ $review->id }}</th>
                <td>{{ $review->user->first_name }} {{ $review->user->last_name }}</td>
                <td>{{ $review->car->brand->name }} {{ $review->car->make }} {{ $review->car->model }}</td>
                <td>
                    <a href="{{ route('admin.reviews.show', $review->id) }}" title="Detail" class="btn btn-secondary">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="post" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this review?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {!! $reviews->links("pagination::bootstrap-5") !!}
    </div>
</div>
@endsection
