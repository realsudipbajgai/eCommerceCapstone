@extends('layouts.base')
@section('content')
<div id="car-index-page" class="container-fluid">
    <div class="text-center">
        <h1>Cars</h1>
    </div>
    <aside class="sidebar phone">
        <h2>Categories</h2>
        <div class="category-list">
            <div><a class="category" href="{{ route('cars.index') }}">All Categories</a></div>

            @foreach($categories as $category)
            <div><a class="category" href="{{ route('cars.filter', ['category' => $category->id]) }}">{{ $category->name }}</a></div>
            @endforeach
        </div>
        <h2>Filter Options</h2>
        <form id="filter-form" action="{{ route('cars.filter') }}" method="GET">
            @csrf
            <div class="filter-section">
                <label class="header container-fluid" for="make">Make</label>
                <select id="make" name="make">
                    <option value="all">All Makes</option>
                    @foreach($makes as $make)
                    <option value="{{ $make }}" @if($selectedMake===$make) selected @endif>{{ $make }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-section">
                <label class="header container-fluid" for="model">Model</label>
                <select id="model" name="model">
                    <option value="all">All Models</option>
                    @foreach($models as $model)
                    <option value="{{ $model }}" @if($selectedModel===$model) selected @endif>{{ $model }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-section">
                <label class="header container-fluid" for="year">Year</label>
                <select id="year" name="year">
                    <option value="all">All Years</option>
                    @foreach($years as $year)
                    <option value="{{ $year }}" @if($selectedYear==$year) selected @endif>{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="filter-section">
                <label class="header container-fluid" for="price">Price Range</label>
                <input type="number" id="min-price" name="min-price" placeholder="Min Price" value="{{ $minPrice }}" />
                <input type="number" id="max-price" name="max-price" placeholder="Max Price" value="{{ $maxPrice }}" />
            </div>
            <button type="submit">Apply Filters</button>
            <button type="button" id="reset-filters">Reset Filters</button>
        </form>
    </aside>

    <div class="main-content">
        <!-- Menu Icon -->
        <div class="menu-icon-filter">
            <div class="filter-button">Filter</div>
            <div class="back-button"><img src="/images/icon/back.png" alt="back-icon" class=""></div>
        </div>

        <aside class="sidebar pc">
            <h2>Categories</h2>
            <div class="category-list">
                <div><a class="category" href="{{ route('cars.index') }}">All Categories</a></div>

                @foreach($categories as $category)
                <div><a class="category" href="{{ route('cars.filter', ['category' => $category->id]) }}">{{ $category->name }}</a></div>
                @endforeach
            </div>
            <h2>Filter Options</h2>
            <form id="filter-form" action="{{ route('cars.filter') }}" method="GET">
                @csrf
                <div class="filter-section">
                    <label class="header container-fluid" for="make">Make</label>
                    <select id="make" name="make">
                        <option value="all">All Makes</option>
                        @foreach($makes as $make)
                        <option value="{{ $make }}" @if($selectedMake===$make) selected @endif>{{ $make }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-section">
                    <label class="header container-fluid" for="model">Model</label>
                    <select id="model" name="model">
                        <option value="all">All Models</option>
                        @foreach($models as $model)
                        <option value="{{ $model }}" @if($selectedModel===$model) selected @endif>{{ $model }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-section">
                    <label class="header container-fluid" for="year">Year</label>
                    <select id="year" name="year">
                        <option value="all">All Years</option>
                        @foreach($years as $year)
                        <option value="{{ $year }}" @if($selectedYear==$year) selected @endif>{{ $year }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-section">
                    <label class="header container-fluid" for="price">Price Range</label>
                    <input type="number" id="min-price" name="min-price" placeholder="Min Price" value="{{ $minPrice }}" />
                    <input type="number" id="max-price" name="max-price" placeholder="Max Price" value="{{ $maxPrice }}" />
                </div>
                <button type="submit">Apply Filters</button>
                <button type="button" id="reset-filters">Reset Filters</button>
            </form>
        </aside>
        @if (count($cars) > 0)
        <div id="car-index" class="col container-fluid">

            @foreach($cars as $car)
            <div class="car-detail container">
                <div class="hover-layer">
                    <a href="/cars/{{$car->id}}" class="card-image" style="background-image: url('/storage/{{$car->image}}');">
                        <div class="price-container">
                            ${{ $car->price }}
                        </div>
                    </a>
                </div>

                <div>
                    <!-- <img src="/images/cars/civic_ex.jpg" alt="{{$car->make}} {{$car->model}}" class=""> -->

                    <!-- <img src="/storage/{{$car->image}}" alt="{{$car->make}} {{$car->model}}" class=""> -->
                </div>

                <div>
                    <div scope="row"><a class="car-name-link" href="#">{{ $car->make }} {{ $car->model }}</a></div>
                </div>
                <div class="field-container">
                    <p class="car-field"><img src="/images/icon/mileague.png" alt="paint-icon" class=""> {{ $car->mileage}} </p>
                    <p class="car-field"><img src="/images/icon/paint.png" alt="paint-icon" class=""> {{ $car->color}} </p>
                    <p class="car-field"><img src="/images/icon/calendar.png" alt="calendar-icon" class=""> {{ $car->year}} </p>
                </div>


            </div>
            @endforeach
        </div>
        @else
        <div class="no-car-result col container-fluid">
            <div class="text-box container-fluid">
                <p>No cars found matching your search.</p>
            </div>

        </div>



        @endif


    </div>
    @if (count($cars) > 0)
    <div class="container-fluid">
        {!! $cars->links('pagination.custom') !!}
    </div>
    @endif
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Toggle sidebar when clicking on the menu icon
        var back_button = $(".back-button");
        var filter_button = $(".filter-button");
        var menu_icon_filter = $('.menu-icon-filter');

        back_button.hide();
        menu_icon_filter.click(function() {
            let phoneSidebar = $('.phone');
            phoneSidebar.fadeToggle("fast", function() {
                if (phoneSidebar.css('display') !== 'none') {
                    back_button.show();
                    filter_button.hide();
                } else {
                    back_button.hide();
                    filter_button.show();
                }
            });
            phoneSidebar.toggleClass("col");


        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const resetButton = document.getElementById('reset-filters');
        const makeSelect = document.getElementById('make');
        const modelSelect = document.getElementById('model');
        const yearSelect = document.getElementById('year');
        const minPriceInput = document.getElementById('min-price');
        const maxPriceInput = document.getElementById('max-price');

        resetButton.addEventListener('click', function() {
            makeSelect.value = 'all';
            modelSelect.value = 'all';
            yearSelect.value = 'all';
            minPriceInput.value = '';
            maxPriceInput.value = '';
        });
    });
</script>
@endpush

@endsection