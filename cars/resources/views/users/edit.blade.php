@extends('layouts.base')
@section('content')
<div id="profilePage" class="container-fluid p-3">
    <div class="container edit-form">
        <h1>{{$title}}</h1>
        <form method="POST" action="/user/update">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" value="{{old('first_name',$user->first_name)}}" name="first_name">
                @error('first_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" value="{{old('last_name',$user->last_name)}}" name="last_name">
                @error('last_name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" value="{{old('country',$user->country)}}" name="country">
                @error('country')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" value="{{old('street',$user->street)}}" name="street">
                @error('street')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" value="{{old('city',$user->city)}}" name="city">
                @error('city')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
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
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" value="{{old('postal_code',$user->postal_code)}}" name="postal_code">
                @error('postal_code')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" value="{{old('phone',$user->phone)}}" name="phone">
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>
            </div>
            <div class="container">
                <button type="submit" class="update-button">Update</button>
            </div>

        </form>
    </div>

</div>
@endsection