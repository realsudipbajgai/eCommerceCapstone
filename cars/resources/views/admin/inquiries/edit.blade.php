@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}} - {{$inquiry->id}}</h1>
    </div>
    <form method="post" action="/admin/inquiries/{{$inquiry->id}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name',$inquiry->name)}}">
            @error('name')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email',$inquiry->email)}}">
            @error('email')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone',$inquiry->phone)}}">
            @error('phone')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject',$inquiry->subject)}}">
            @error('subject')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"
                rows="4">{!!old('description',$inquiry->description)!!}</textarea>
                @error('description')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/admin/inquiries" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection