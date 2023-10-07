@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}}</h1>
        <form class="d-flex mt-3" role="search" action="/admin/orders/search" method="GET">
            <input class="form-control me-2" type="search" placeholder="Search"
                aria-label="Search" name="search">
            <button class="btn btn-outline-success"
                type="submit">Search</button>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Cars</th>
                <th scope="col">Customer</th>
                <th scope="col">Name</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <th scope="row">{{$order->id}}</th>
                <td>
                    <ul>
                        @foreach ( $order->cars as $car)
                       <li>     <a href="/admin/cars/{{$car->id}}"
                            title="View Detail">{{$car->brand->name}} {{$car->make}}</a></li>
                        @endforeach
                    </ul>
                    
                </td>
                <td> <a href="/admin/users/{{$order->customer_id}}"
                        title="View Detail">View Detail</a></td>
                <td>{{$order->name}}</td>
                <td>{{$order->total}}</td>
                <td>
                    @if ($order->order_status=='Pending')
                    <span
                        class="badge bg-warning">{{$order->order_status}}</span>
                    @elseif($order->order_status=='Confirmed')
                    <span
                        class="badge bg-primary">{{$order->order_status}}</span>
                    @elseif($order->order_status=='Shipped')
                    <span class="badge bg-info">{{$order->order_status}}</span>
                    @else
                    <span
                        class="badge bg-success">{{$order->order_status}}</span>
                    @endif
                </td>
                <td>
                    <a href="/admin/orders/edit/{{$order->id}}"
                        class="btn btn-primary" title="Edit"><i
                            class="bi bi-pencil-square"></i></a>
                    <a href="/admin/orders/{{$order->id}}" title="Detail"
                        class="btn btn-secondary"><i
                            class="bi bi-eye-fill"></i></a>
                    <form action="/admin/orders/{{$order->id}}" method="post"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure want to delete?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete" class="btn btn-danger "><i
                                class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div>
        {!! $orders->links("pagination::bootstrap-5") !!}
    </div>
</div>
@endsection