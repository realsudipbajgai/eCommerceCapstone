@extends('layouts.base')

@section('content')
<div id = "registerPage" class="container-fluid p-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card sign-form">
                <div class="card-header form-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="first_name"
                                class="col-md-4 col-form-label text-md-end">First
                                Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text"
                                    class="form-control @error('first_name') is-invalid @enderror"
                                    name="first_name"
                                    value="{{ old('first_name') }}" required
                                    autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="last_name"
                                class="col-md-4 col-form-label text-md-end">Last
                                Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name"
                                    value="{{ old('last_name') }}" required
                                    autocomplete="last_name" autofocus>

                                @error('last_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country"
                                class="col-md-4 col-form-label text-md-end">Country</label>

                            <div class="col-md-6">
                                <input id="country" type="text"
                                    class="form-control @error('country') is-invalid @enderror"
                                    name="country" value="{{ old('country') }}"
                                    required autocomplete="country" autofocus>

                                @error('country')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="street"
                                class="col-md-4 col-form-label text-md-end">Street</label>

                            <div class="col-md-6">
                                <input id="street" type="text"
                                    class="form-control @error('street') is-invalid @enderror"
                                    name="street" value="{{ old('street') }}"
                                    required autocomplete="street" autofocus>

                                @error('street')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="city"
                                class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text"
                                    class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}"
                                    required autocomplete="city" autofocus>

                                @error('city')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="city"
                                class="col-md-4 col-form-label text-md-end">Province</label>

                            <div class="col-md-6">
                                <select class="form-control" name="province_id">
                                    <option selected value="">---SELECT---
                                    </option>
                                    @foreach($provinces as $key=>$value)
                                    @if(!empty(old('province_id'))&&old('province_id')==$key)
                                    <option value="{{$key}}" selected>{{$value}}
                                    </option>
                                    @else
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('province_id')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label for="postal_code"
                                class="col-md-4 col-form-label text-md-end">Postal
                                Code</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text"
                                    class="form-control @error('postal_code') is-invalid @enderror"
                                    name="postal_code"
                                    value="{{ old('postal_code') }}" required
                                    autocomplete="postal_code" autofocus>

                                @error('postal_code')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-end">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}"
                                    required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}"
                                    required autocomplete="email">

                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password"
                                    class="form-control"
                                    name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection