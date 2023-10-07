@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    <div class="card">
        <div class="card-header">
            Province Details
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{$province->name}}</p>
            <p><strong>PST (%):</strong> {{$province->pst}}</p>
            <p><strong>GST/HST (%):</strong> {{$province->gst_hst}}</p>
        </div>
    </div>
</div>
@endsection
