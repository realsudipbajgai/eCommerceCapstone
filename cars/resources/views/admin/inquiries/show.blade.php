@extends('layouts.app')

@section('content')
<div class="container admin-inquiry-show-container">
    <form method="post" action="/admin/inquiries/{{$inquiry->id}}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row shadow shadow-lg p-3">
        <h1>{{$title}}</h1>
        <div class="d-flex justify-content-between my-2">
            <a href="{{url()->previous()}}" class="btn btn-secondary">Go Back</a>
        </div>

            <div class="col-md-6 border p-3">
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold">Name</label>
                    <div class="col-sm-7 text-primary">{{$inquiry->name}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Email</label>
                    <div class="col-sm-7 text-primary">{{$inquiry->email}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Phone</label>
                    <div class="col-sm-7 text-primary">{{$inquiry->phone}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Subject</label>
                    <div class="col-sm-7 text-primary">{{$inquiry->subject}}</div>
                </div>
                <div class=" row">
                    <label class="form-label col-sm-5 fw-bold ">Description</label>
                    <div class="col-sm-7 text-primary">{{$inquiry->description}}</div>
                </div>
            </div>
            
        </div>
      
</form>
</div>
@endsection