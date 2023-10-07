@extends('layouts.app')

@section('content')
<div class="container admin-car-show-container">
    <div class="row shadow shadow-lg p-3">
        <h1>{{$title}}</h1>
        <div class="d-flex my-2">
            <a href="/admin/orders" class="btn btn-secondary">Go Back</a>
            <a href="/admin/orders/edit/{{$order->id}}"
                class="btn btn-primary ms-2">Edit</a>
        </div>
        <div class="border p-3">
            <h2>List of Items</h2>
            <div class=" mb-3">
                <ul>
                    @foreach ($order->cars as $car)
                    <li class="fs-4">
                        <a href="/admin/cars/{{$car->id}}">{{$car->brand->name}}
                            {{$car->model}} {{$car->make}}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
        </div>
        <div class="border p-3">
            <h2>Transactions</h2>
            <div class=" mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Transaction Id</th>
                            <th scope="col">Authorization Code</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($order->transactions)>0)
                        @foreach ($order->transactions as $transaction)
                        @php
                        $response_arr=json_decode($transaction->transaction_response)
                        @endphp
                        <tr>
                            <th scope="row">{{$transaction->transaction_id}}
                            </th>
                            <td>{{$response_arr->auth_code}}</td>
                            <td>
                                @if($response_arr->response_code==1)
                                <span
                                    class="badge bg-success">Successfull</span>
                                @else
                                <span class="badge bg-danger">Failed</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3" class="text-center"> No transactions</td>
                        </tr>
                        @endif

                    </tbody>
                </table>

            </div>

        </div>
        <div class="col-md-6 border p-3">
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold">Name</label>
                <div class="col-sm-7 text-primary">{{$order->name}}</div>
            </div>
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">Street</label>
                <div class="col-sm-7 text-primary">{{$order->street}}</div>
            </div>
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">City</label>
                <div class="col-sm-7 text-primary">{{$order->city}}</div>
            </div>
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">Province</label>
                <div class="col-sm-7 text-primary">{{$order->province_state}}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">Country</label>
                <div class="col-sm-7 text-primary">{{$order->country}}</div>
            </div>
            <div class="row">
                <label class="form-label col-sm-5 fw-bold ">Status</label>
                <div class="col-sm-7 text-primary">{{$order->order_status}}
                </div>
            </div>
        </div>
        <div class="col-md-6 p-3 border">
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">Postal Code</label>
                <div class="col-sm-7 text-primary">{{$order->postal_code}}</div>
            </div>
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">Sub total</label>
                <div class="col-sm-7 text-primary">{{$order->sub_total}}</div>
            </div>
            <div class="mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">Shipping
                    Cost</label>
                <div class="col-sm-7 text-primary">{{$order->shipping_cost}}
                </div>
            </div>
            <div class=" mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">GST</label>
                <div class="col-sm-7 text-primary">{{$order->gst}}</div>
            </div>
            <div class=" mb-3 row">
                <label class="form-label col-sm-5 fw-bold ">PST</label>
                <div class="col-sm-7 text-primary">{{$order->pst}}</div>
            </div>
            <div class="row">
                <label class="form-label col-sm-5 fw-bold ">Total</label>
                <div class="col-sm-7 text-primary">{{$order->total}}</div>
            </div>
        </div>

    </div>
</div>
@endsection