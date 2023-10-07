@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>{{$title}}</h1>
        </div>
        <div class="card-body">
            <form action="/admin/users/{{$user->id}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" class="form-control" id="first_name"
                        name="first_name" value="{{$user->first_name}}"
                        required>
                    @error('first_name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" class="form-control" id="last_name"
                        name="last_name" value="{{$user->last_name}}" required>
                    @error('last_name')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" id="country"
                        name="country" value="{{$user->country}}" required>
                        @error('country')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="street">Street:</label>
                    <input type="text" class="form-control" id="street"
                        name="street" value="{{$user->street}}" required>
                        @error('street')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" class="form-control" id="city"
                        name="city" value="{{$user->city}}" required>
                        @error('city')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="province_id" class="form-label">Province</label>
                    <select class="form-control" name="province_id">
                        <option selected>---SELECT---</option>
                        @foreach ($provinces as $key=>$value)
                        @if((!empty(old('province_id')&&old('province_id')==$key))||$key==$user->province_id)
                        <option value="{{$key}}" selected>{{$value}}</option>
                        @else
                        <option value="{{$key}}">{{$value}}</option>
                        @endif
                        @endforeach
                    </select> @error('province_id')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" class="form-control" id="postal_code"
                        name="postal_code" value="{{$user->postal_code}}"
                        required>
                        @error('postal_code')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone"
                        name="phone" value="{{$user->phone}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email"
                        name="email" value="{{$user->email}}" required>
                        @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection