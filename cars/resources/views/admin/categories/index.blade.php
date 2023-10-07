@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{ $title }}</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary mt-3">
            <i class="bi bi-plus-circle"></i>
            <span class="">Add New</span>
        </a>
        <form class="d-flex mt-3" role="search" action="/admin/categories/search" method="GET">
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
                <th scope="col">Category Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('admin.categories.show', $category->id) }}" title="Detail"
                        class="btn btn-secondary">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure want to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {!! $categories->links("pagination::bootstrap-5") !!}
    </div>
</div>
@endsection
