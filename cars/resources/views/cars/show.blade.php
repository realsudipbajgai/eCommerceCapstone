@extends('layouts.base')

@section('content')
    <div id="car_detail_page">
        <div class="container info-container">
            
            <!-- Product section -->
            <section>
                <div class="px-4 px-lg-5">
                    <div class="">
                        <a class="btn btn-success btn-sm continue-shopping-btn" href="/cars" style="background-color: #198754;">
                            <i class="bi bi-arrow-left"></i>
                            Continue Shopping
                        </a>
                    </div>
                    <h1 class="display-5 fw-bolder custom-h1">{{ $car->year }} {{ $car->model }} {{ $car->make }}</h1>                    
                    <div class="row">
                        <div class="col">
                            <div>
                               <img class="img-fluid rounded" src="/storage/{{ $car->image }}" alt="{{ $car->make }}"> 
                            </div>
                            <br>
                            <a href="#" class="btn btn-info btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bi bi-star-fill me-1"></i>
                                Reviews
                            </a>
                        </div>                        
                        <div class="col">
                            <div class="fs-5">
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Price </span> </strong>  &nbsp; ${{ $car->price }}</p>
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Make </span> </strong>  &nbsp; {{ $car->make }}</p>
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Model </span> </strong>  &nbsp; {{ $car->model }}</p>
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Year </span> </strong>  &nbsp; {{ $car->year }}</p>
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Mileage </span> </strong>  &nbsp; {{ $car->mileage }} miles</p>
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Color </span> </strong> &nbsp; {{ $car->color }}</p>
                                <p><strong><span class="bg-dark custom-padding" style="color: #ddd">Fuel Type </span> </strong>  &nbsp; {{ $car->fuel_type }}</p>
                            </div>                            
                            <div class="d-flex mt-4">
                                <form action="/cart/add" method="post">
                                    @csrf
                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                    <button class="btn btn-dark btn-lg me-3" type="submit">
                                        <i class="bi bi-cart-fill me-1"></i>
                                        Add to cart
                                    </button>
                                    <a class="btn btn-light btn-lg me-3" href="/cart">
                                        <i class="bi bi-cart-check me-1"></i>
                                        View Cart
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="lead car_description">
                            {{-- <button class="btn btn-info btn-sm toggle-description-btn">Show Description</button> --}}
                            <i class="bi bi-caret-down-square-fill btn btn-info toggle-description-btn"> Description</i>
                            <div class="description-content" style="display: none;">
                                {!! $car->description !!}
                            </div>
                        </p>
                    </div>
                </div>
            </section>
            {{-- <div class="bottom-middle mt-2">
                <a class="btn btn-dark btn-lg me-3" href="/cart">
                    <i class="bi bi-cart-check me-1"></i>
                    View Cart
                </a>
                <a href="#" class="btn btn-success btn-lg"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi bi-star-fill me-1"></i>
                    Reviews
                </a>
            </div>                        --}}
        </div>
    </div>
    <!-- Partial Modal View For Car Reviews -->
    @include('partials.car_reviews',['car'=>$car])
@endsection