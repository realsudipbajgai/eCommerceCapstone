@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Discount</h1>
    <form action="{{ route('admin.discounts.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="promo_code" class="form-label">Promo Code</label>
            <input type="text" name="promo_code" id="promo_code" class="form-control @error('promo_code') is-invalid @enderror" value="{{ old('promo_code') }}" required>
            @error('promo_code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="discount_percentage" class="form-label">Discount Percentage</label>
            <input type="text" name="discount_percentage" id="discount_percentage" class="form-control @error('discount_percentage') is-invalid @enderror" value="{{ old('discount_percentage') }}" required>
            @error('discount_percentage')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection