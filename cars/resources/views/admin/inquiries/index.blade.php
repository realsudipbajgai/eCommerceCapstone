@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}}</h1>
        <a href="/admin/inquiries/create" class="btn btn-outline-primary mt-3">
            <i class="bi bi-plus-circle"></i>
            <span class="">Add New</span>
        </a>
        <form class="d-flex mt-3" role="search" action="/admin/inquiries/search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search"
                aria-label="Search" name="search">
            <button class="btn btn-outline-success"
                type="submit">Search</button>
        </form>
    </div>
    <table class="table table-hover" >
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Subject</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inquiries as $inquiry)
            <tr>
                <th scope="row">{{$inquiry->id}}</th>
                <td>{{$inquiry->name}}</td>
                <td>{{$inquiry->email}}</td>
                <td>{{$inquiry->phone}}</td>
                <td>{{$inquiry->subject}}</td>
                <td>
                    <a href="/admin/inquiries/edit/{{$inquiry->id}}" class="btn btn-primary" title="Edit"><i
                            class="bi bi-pencil-square"></i></a>
                    <a href="/admin/inquiries/{{$inquiry->id}}" title="Detail"
                        class="btn btn-secondary"><i
                            class="bi bi-eye-fill"></i></a>
                    <form action="/admin/inquiries/{{$inquiry->id}}" method="post"
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
        {!! $inquiries->links("pagination::bootstrap-5") !!}
    </div>
</div>
@endsection