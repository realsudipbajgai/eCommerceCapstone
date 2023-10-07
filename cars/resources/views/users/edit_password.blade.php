@extends('layouts.base')
@section('content')
<div id="profilePage" class="container-fluid p-3">
  <div class="container edit-form">
  <h1>{{$title}}</h1>
  <form method="POST" action="/user/security">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" value="{{$user->email}}" disabled>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password">
      @error('password')
      <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>
    <button type="submit" class="update-button">Update</button>
  </form>
  </div>
  
</div>
@endsection