@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between my-1">
        <h1>{{$title}}</h1>
    </div>
    <form method="post" action="/admin/cars/{{$car->id}}"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option selected>---SELECT---</option>
                @foreach ($categories as $key=>$value)
                @if((!empty(old('category_id')&&old('category_id')==$key))||$key==$car->category_id)
                <option value="{{$key}}" selected>{{$value}}</option>
                @else
                <option value="{{$key}}">{{$value}}</option>
                @endif
                @endforeach
            </select> @error('category_id')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="brand_id" class="form-label">Brand</label>
            <select class="form-select" name="brand_id">
                <option selected>---SELECT---</option>
                @foreach ($brands as $key=>$value)
                @if((!empty(old('brand_id')&&old('brand_id')==$key))||$key==$car->brand_id)
                <option value="{{$key}}" selected>{{$value}}</option>
                @else
                <option value="{{$key}}">{{$value}}</option>
                @endif
                @endforeach
            </select> @error('brand_id')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="make" class="form-label">Make</label>
            <input type="text" class="form-control" id="make" name="make"
                value="{{old('make',$car->make)}}">
            @error('make')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" class="form-control" id="model" name="model"
                value="{{old('model',$car->model)}}">
            @error('model')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" class="form-control" id="year" name="year"
                value="{{old('year',$car->year)}}">
            @error('year')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price"
                value="{{old('price',$car->price)}}">
            @error('price')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mileage" class="form-label">Mileage</label>
            <input type="text" class="form-control" id="mileage" name="mileage"
                value="{{old('mileage',$car->mileage)}}">
            @error('mileage')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color"
                value="{{old('color',$car->color)}}">
            @error('color')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="fuel_type" class="form-label">Fuel Type</label>
            <input type="text" class="form-control" id="fuel_type"
                name="fuel_type" value="{{old('fuel_type',$car->fuel_type)}}">
            @error('fuel_type')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description"
                rows="4">{!!old('description',$car->description)!!}</textarea>
            @error('description')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <img src="/storage/{{$car->image??'default.jpg'}}" class="mb-2"
                style="width:200px;height:auto">
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/admin/cars" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection