@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$title}}</h1>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="card">
                    <div class="card-header">Top Sale Car</div>
                    <div class="card-body">
                        @if ($topSaleCar)
                        <h5 class="card-title">{{$topSaleCar->make}} {{$topSaleCar->model}}</h5>
                        <p class="card-text">Total Sales: {{$topSaleCar->total_sales}}</p>
                        @else
                        <p class="card-text">No car records found.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="card">
                    <div class="card-header">Total of Last Day Sold Car Price</div>
                    <div class="card-body">
                        @if ($lastDaySoldCarPrice)
                        <p class="card-text">Total Price: ${{$lastDaySoldCarPrice->total_price}}</p>
                        @else
                        <p class="card-text">No sold car records found.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="card">
                    <div class="card-header">Least Sale Car</div>
                    <div class="card-body">
                        @if ($leastSaleCar)
                        <h5 class="card-title">{{$leastSaleCar->make}} {{$leastSaleCar->model}}</h5>

                        <p class="card-text">No car records found.</p>
                        @endif
                    </div>
                </div>

            </div>
            <div class="row mt-3">
                <div class="card">
                    <div class="card-header">Pending Car Orders to Shipped</div>
                    <div class="card-body">
                        @if ($pendingCarOrders)
                        <p class="card-text">Pending Orders: {{$pendingCarOrders->pending_orders}}</p>
                        @else
                        <p class="card-text">No pending orders found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">Ratio of Selling Cars Based on Categories</div>
                <div class="card-body">
                    @if ($categorySales->isNotEmpty())
                    <canvas id="categoryPieChart" width="400" height="200"></canvas>
                    <div class="mt-3">
                        <ul>
                            @foreach($categorySales as $categorySale)
                            <li>Category: {{ $categorySale->category->name }} - Sales: {{ $categorySale->total_sales }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <p class="card-text">No sales data available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>




    <div class="row mt-3">
        <div class="col-md-8">

        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    @if($categorySales -> isNotEmpty())
    var ctx = document.getElementById('categoryPieChart').getContext('2d');
    var categoryData = @json($categorySales);

    var data = [];
    var labels = [];
    var colors = [];

    categoryData.forEach(function(item) {
        data.push(item.total_sales);
        labels.push('Category ' + item.category_id);
        colors.push(getRandomColor());
    });

    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: colors,
            }]
        },
        // options: {
        //     title: {
        //         display: true,
        //         text: 'Percentage of Selling Cars Based on Categories',
        //     },

            options: {
                title: {
                    display: true,
                    text: 'Ratio of Selling Cars Based on Categories',
                },
                plugins: {
                    datalabels: {
                        color: '#fff', // Data label text color
                        formatter: function(value, context) {
                            var percentage = (value * 100 / data.reduce((a, b) => a + b, 0)).toFixed(1);
                            return percentage + '%';
                        },
                    }
                },
        }
    });

    // Function to get random colors for the pie chart
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
    @endif
</script>
@endsection