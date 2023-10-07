@extends('layouts.base')
@section('content')
<div class="orders-page container">
    <h1>{{$title}}</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Shipping Detail</th>
                <th>Order Detail</th>
                <th>Order Status</th>
                <th>Total Amount</th>

            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td><a href="/orders/{{$order->id}}">{{$order->id}}</a></td>
                <td>
                    <p>{{$order->name}} </p>
                    <p>{{$order->street}}, {{$order->city}}, {{$order->province_state}}, {{$order->country}}, {{$order->postal_code}}</p>
                </td>
                <td>
                    @foreach ($order->cars as $car)
                    <ul>
                        <li>{{ $car->id }} {{ $car->make }} {{ $car->model }} {{ $car->year }}</li>
                        <li><img src="/images/cars/{{ $car['image'] }}" alt="{{ $car['make'] }}" style="width: 100px;height:auto">
                        </li>
                    </ul>
                    @endforeach
                
                </td>
                <td> {{$order->order_status}} </td>
                <td> {{number_format($order->total, 2)}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection