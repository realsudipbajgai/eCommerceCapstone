@extends('layouts.app')

@section('content')
<div class="container admin-car-show-container">
    <form method="post" action="/admin/cars/{{$car->id}}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row shadow shadow-lg p-3">
        <h1>{{$title}} - {{$car->make}} {{$car->model}}</h1>
        <div class="d-flex justify-content-between my-2">
            <a href="{{url()->previous()}}" class="btn btn-secondary">Go Back</a>
        </div>
            <div class="col-md-12 my-4">
                <img src="/storage/{{$car->image}}" CLASS="img-fluid"
                    ALT="{{$car->make}} {{$car->model}}" STYLE="width: 100%;">
            </div>
            <div class="col-md-12 mb-4">
                {!!$car->description!!}
            </div>
            <div class="col-md-6 border p-3">
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold">Category</label>
                    <div class="col-sm-7 text-primary">{{$car->category->name}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Brand</label>
                    <div class="col-sm-7 text-primary">{{$car->brand->name}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Make</label>
                    <div class="col-sm-7 text-primary">{{$car->make}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Model</label>
                    <div class="col-sm-7 text-primary">{{$car->model}}</div>
                </div>
                <div class=" row">
                    <label class="form-label col-sm-5 fw-bold ">Year</label>
                    <div class="col-sm-7 text-primary">{{$car->year}}</div>
                </div>
            </div>
            <div class="col-md-6 p-3 border">
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Price</label>
                    <div class="col-sm-7 text-primary">{{$car->price}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Mileage</label>
                    <div class="col-sm-7 text-primary">{{$car->mileage}}</div>
                </div>
                <div class="mb-3 row">
                    <label class="form-label col-sm-5 fw-bold ">Color</label>
                    <div class="col-sm-7 text-primary">{{$car->color}}</div>
                </div>
                <div class="row">
                    <label class="form-label col-sm-5 fw-bold ">Fuel Type</label>
                    <div class="col-sm-7 text-primary">{{$car->fuel_type}}</div>
                </div>
            </div>
 
        </div>
      
</form>
</div>
@endsection