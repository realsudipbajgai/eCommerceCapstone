@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    <form action="/admin/provinces/{{$province->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Province Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$province->name}}" required>
        </div>
        <div class="mb-3">
            <label for="pst" class="form-label">PST (%)</label>
            <input type="number" step="0.001" class="form-control" id="pst" name="pst" value="{{$province->pst}}" required>
        </div>
        <div class="mb-3">
            <label for="gst_hst" class="form-label">GST/HST (%)</label>
            <input type="number" step="0.001" class="form-control" id="gst_hst" name="gst_hst" value="{{$province->gst_hst}}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
