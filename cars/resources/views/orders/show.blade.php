@extends('layouts.base')
@section('content')
<div class="orders-details container">
    <h1>{{$title}}</h1>
    <div class="row">
        <div class="col">
            <div class="item-summary">
                <h2>Item Summary</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Car ID</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->cars as $car)

                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->make }}</td>
                            <td>{{ $car->model }}</td>
                            <td>$ {{ $car->price }}</td>
                            <td><img src="/images/cars/{{ $car['image'] }}" alt="{{ $car['make'] }}" style="width: 100px;height:auto">
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
                

            </div>
        </div>
        <div class="col">

            @if (!$order)
            <p>Order not found.</p>
            @else
            <div class="order-detail-table">
            <h2>Order Detail</h2>
                <table>
                    <tr>
                        <th>Shipping Address</th>
                        <td>{{$order['street']}}, {{$order['city']}}, {{$order['province_state']}}, {{$order['country']}}, {{$order['postal_code']}}</td>
                    </tr>
                    <tr>
                        <th>Created Date</th>
                        <td>{{date($order['created_at'])}}</td>
                    </tr>
                    <tr>
                        <th>Last Update</th>
                        <td>{{date($order['updated_at'])}}</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>{{$order['order_status']}}</td>
                    </tr>
                    <tr>
                            <th>Subtotal</th>
                            <td>$<?php echo number_format($order->sub_total, 2); ?></td>
                        </tr>
                        <tr>
                            <th>PST (<?php echo (config('global.pst') * 100) . '%'; ?>)</th>
                            <td>$<?php echo number_format($order->pst, 2); ?></td>
                        </tr>
                        <tr>
                            <th>GST (<?php echo (config('global.gst') * 100) . '%'; ?>)</th>
                            <td>$<?php echo number_format($order->gst, 2); ?></td>
                        </tr>
                        <tr>
                            <th>Shipping Cost</th>
                            <td>$<?php echo number_format($order->shipping_cost, 2); ?></td>
                        </tr>

                        <tr>
                            <th>Final Price</th>
                            <td>$<?php echo number_format($order->total, 2); ?></td>
                        </tr>
                </table>
                
            </div>
            @endif
        </div>
    </div>



</div>
@endsection