@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Discount Details</h1>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{ $discount->id }}</td>
            </tr>
            <tr>
                <th scope="row">Promo Code</th>
                <td>{{ $discount->promo_code }}</td>
            </tr>
            <tr>
                <th scope="row">Discount Percentage</th>
                <td>{{ $discount->discount_percentage }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection