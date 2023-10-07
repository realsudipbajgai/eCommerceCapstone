@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$title}}</h1>
        </div>
        <div class="d-flex justify-content-between my-2">
            <a href="/admin/users" class="btn btn-secondary">Go Back</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{$user->id}}</td>
                    </tr>
                    <tr>
                        <th scope="row">First Name</th>
                        <td>{{$user->first_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Last Name</th>
                        <td>{{$user->last_name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Country</th>
                        <td>{{$user->country}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Street</th>
                        <td>{{$user->street}}</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>{{$user->city}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Province</th>
                        <td>{{$user->province->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Postal Code</th>
                        <td>{{$user->postal_code}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Phone</th>
                        <td>{{$user->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{$user->email}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
