@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}}</h1>
        <a href="/admin/cars">View Car List</a>
        <a href="/admin/users">View Customers</a>
    </div>
    <div class="border p-3 my-3">
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
                            <span class="badge bg-success">Successfull</span>
                            @else
                            <span class="badge bg-danger">Failed</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" class="text-center"> No transactions
                        </td>
                    </tr>
                    @endif

                </tbody>
            </table>

        </div>

    </div>
    <div class="border p-3">
        <form method="post" action="/admin/orders/{{$order->id}}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class=" mb-3">
                        Cars
                        <ul>
                            @foreach ($order->cars as $car)
                            <li>
                                <a href="/admin/cars/{{$car->id}}">{{$car->brand->name}}
                                    {{$car->model}} {{$car->make}}</a>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                    <div class="mb-3">
                        <label for="customer_id" class="form-label">Customer
                            Id</label>
                        <input type="text" class="form-control" id="customer_id"
                            name="customer_id"
                            value="{{old('customer_id',$order->customer_id)}}"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name"
                            name="name" value="{{old('name',$order->name)}}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Street</label>
                        <input type="text" class="form-control" id="street"
                            name="street"
                            value="{{old('street',$order->street)}}">
                        @error('street')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city"
                            name="city" value="{{old('city',$order->city)}}">
                        @error('city')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="province_state"
                            class="form-label">Province/State</label>
                        <input type="text" class="form-control"
                            id="province_state" name="province_state"
                            value="{{old('province_state',$order->province_state)}}">
                        @error('province_state')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country"
                            name="country"
                            value="{{old('country',$order->country)}}">
                        @error('country')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="postal_code" class="form-label">Postal
                            Code</label>
                        <input type="text" class="form-control" id="postal_code"
                            name="postal_code"
                            value="{{old('postal_code',$order->postal_code)}}">
                        @error('postal_code')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="mb-3">
                        <label for="sub_total" class="form-label">Sub
                            Total</label>
                        <input type="text" class="form-control" id="sub_total"
                            name="sub_total"
                            value="{{old('sub_total',$order->sub_total)}}">
                        @error('sub_total')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="shipping_cost" class="form-label">Shipping
                            Cost</label>
                        <input type="text" class="form-control"
                            id="shipping_cost" name="shipping_cost"
                            value="{{old('shipping_cost',$order->shipping_cost)}}">
                        @error('shipping_cost')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gst" class="form-label">GST</label>
                        <input type="text" class="form-control" id="gst"
                            name="gst" value="{{old('gst',$order->gst)}}">
                        @error('gst')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pst" class="form-label">PST</label>
                        <input type="text" class="form-control" id="pst"
                            name="pst" value="{{old('pst',$order->pst)}}">
                        @error('pst')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control" id="total"
                            name="total" value="{{old('total',$order->total)}}">
                        @error('total')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="order_status"
                            class="form-label">Category</label>
                        <select class="form-select" name="order_status">
                            <option value="Pending"
                                <?=($order->order_status=='Pending')?'selected':''?>>
                                Pending</option>
                            <option value="Confirmed"
                                <?=($order->order_status=='Confirmed')?'selected':''?>>
                                Confirmed</option>
                            <option value="Shipped"
                                <?=($order->order_status=='Shipped')?'selected':''?>>
                                Shipped</option>
                            <option value="Delivered"
                                <?=($order->order_status=='Delivered')?'selected':''?>>
                                Delivered</option>
                        </select> @error('order_status')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/admin/orders" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection