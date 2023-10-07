@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}}</h1>
        <a href="/admin/cars/create" class="btn btn-outline-primary mt-3">
            <i class="bi bi-plus-circle"></i>
            <span class="">Add New</span>
        </a>
        <form class="d-flex mt-3" role="search" action="/admin/cars/search"
            method="GET">
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
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Price</th>
                <th scope="col">Color</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <th scope="row">{{$car->id}}</th>
                <td>
                    <a href="/admin/cars/{{$car->id}}">
                        <img src="/storage/{{$car->image}}"
                            alt="{{$car->make}} {{$car->model}}"
                            class="car-thumbnail">
                    </a>
                </td>
                <td>{{$car->category->name}}</td>
                <td>{{$car->brand->name}}</td>
                <td>{{$car->make}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->year}}</td>
                <td>{{$car->price}}</td>
                <td>{{$car->color}}</td>
                <td>
                    <a href="/admin/cars/edit/{{$car->id}}"
                        class="btn btn-primary" title="Edit"><i
                            class="bi bi-pencil-square"></i></a>
                    <a href="/admin/cars/{{$car->id}}" title="Detail"
                        class="btn btn-secondary"><i
                            class="bi bi-eye-fill"></i></a>
                    <form action="/admin/cars/{{$car->id}}" method="post"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure want to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i
                                class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {!! $cars->links("pagination::bootstrap-5") !!}
    </div>
</div>

@endsection