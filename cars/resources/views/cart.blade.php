@extends('layouts.base')

@section('content')
    <div class="container mb-3">
        <h1 class="my-4">Cart</h1>
        @if (count($cartData) > 0)
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Car ID</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartData as $index => $item)
                        @php
                            $total += $item['price'];
                        @endphp
                        <tr>
                            <td>{{ $item['car_id'] }}</td>
                            <td>{{ $item['make'] }}</td>
                            <td>{{ $item['model'] }}</td>
                            <td>${{ $item['price'] }}</td>
                            <td><img src="/storage/{{ $item['image'] }}" alt="{{ $item['make'] }}" style="width: 100px;"></td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="index" value="{{ $index }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-success">
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td colspan="3">${{ number_format($total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-center">
                <form action="/checkout" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-cart-check"></i>
                        Proceed to Checkout - ${{ number_format($total, 2) }}
                    </button>
                </form>
            </div>
        @else
            <div class="alert alert-info text-center my-4">
                Your cart is empty. Please add items to your cart first.
            </div>
        @endif
    </div>
@endsection