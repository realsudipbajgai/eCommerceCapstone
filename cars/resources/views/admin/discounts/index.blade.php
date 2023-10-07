@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{ $title }}</h1>
        <a href="{{ route('admin.discounts.create') }}" class="btn btn-outline-primary mt-3">
            <i class="bi bi-plus-circle"></i>
            <span class="">Add New</span>
        </a>
        <form class="d-flex mt-3" role="search" action="/admin/discounts/search" method="GET">
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
                <th scope="col">Promo Code</th>
                <th scope="col">Discount Percentage</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($discounts as $discount)
            <tr>
                <th scope="row">{{ $discount->id }}</th>
                <td>{{ $discount->promo_code }}</td>
                <td>{{ $discount->discount_percentage }}</td>
                <td>
                    <a href="{{ route('admin.discounts.edit', $discount->id) }}" class="btn btn-primary" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <a href="{{ route('admin.discounts.show', $discount->id) }}" title="Detail"
                        class="btn btn-secondary">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="post"
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
        {!! $discounts->links("pagination::bootstrap-5") !!}
    </div>
</div>
@endsection