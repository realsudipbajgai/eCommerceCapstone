@extends('layouts.base')
@section('content')
<div class="container-fluid contact-page">
    <h1>{{$title}}</h1>
    <div class="container">
        <form action="/contact" method="POST">
            @csrf

            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" 
            placeholder="Please enter your name ...">
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror


            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" required
            placeholder="Please enter your email ...">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror


            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" required
            placeholder="Please enter your phone number ...">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror


            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{old('subject')}}" required
            placeholder="Please enter your subject ...">
            @error('subject')
            <span class="text-danger">{{$message}}</span>
            @enderror


            <label for="message">Message</label>
            <textarea class="form-control" id="description" name="description" rows="4" required placeholder="Please enter your message ...">
                {{old('description')}}
            </textarea>
            @error('description')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class="container-fluid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

</div>
@endsection