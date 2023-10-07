@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}}</h1>
        <form class="d-flex mt-3" role="search" action="/admin/users/search" method="GET">
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
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">Province</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->country}}</td>
                <td>{{$user->province->name}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="/admin/users/edit/{{$user->id}}" class="btn btn-primary" title="Edit"><i
                            class="bi bi-pencil-square"></i></a>
                    <a href="/admin/users/{{$user->id}}" title="Detail"
                        class="btn btn-secondary"><i
                            class="bi bi-eye-fill"></i></a>
                    <form action="/admin/users/{{$user->id}}" method="post"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure want to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i
                                class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {!! $users->links("pagination::bootstrap-5") !!}
    </div>
</div>
@endsection
