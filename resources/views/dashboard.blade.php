@extends('layouts.auth')
@section('styles')
    <style>
        .piechart {
            display: block;
            position: relative;
            width: 290px;
            height: 290px;
            border-radius: 50%;
            background-image: conic-gradient(pink 70deg, lightblue 0 235deg, orange 0);
            color: #fff;
            font-size: 14px;
        }

        .piechart .text-slice {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(var(--rotate));
            text-align: center;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <b>Passengers By Age Group</b>
                </div>
                <div class="card-body border">
                    <h5>Children</h5>
                    <p>796,532</p>
                </div>
                <div class="card-body border">
                    <h5> Adolescents</h5>
                    <p>255,507</p>
                </div>
                <div class="card-body border">
                    <h5>Teenager</h5>
                    <p>568,710</p>
                </div>
                <div class="card-body border">
                    <h5>Adult</h5>
                    <p>123,710</p>
                </div>
                <div class="card-body border">
                    <h5>Older Adult</h5>
                    <p>107,710</p>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <b>Nationality of Passengers</b>
                </div>
                <div class="card-body border">
                    <canvas id="horizontalBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>Revenue</b>
                </div>
                <div class="card-body border">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <b>Satisfaction Experience</b>
                </div>
                <div class="card-body border">
                    <div class="piechart">
                        <div class="text-slice" style="--rotate: 35deg;">
                            Satisfied: 40%
                        </div>
                        <div class="text-slice" style="--rotate: 130deg;">
                            Neutral: 30%
                        </div>
                        <div class="text-slice" style="--rotate: 290deg;">
                            Dissatisfied: 30%
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- BAR CHART --}}
    <script>
        // data for the bar chart 
        const barChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Monthly Revenue',
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [350000, 420000, 380000, 400000, 380000, 410000],
            }]
        };

        // Bar chart configuration
        const barChartConfig = {
            type: 'bar',
            data: barChartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: (value) => 'RM' + value,
                        },
                    },
                },
            },
        };

        // Create and render the bar chart
        const barChartCanvas = document.getElementById('barChart').getContext('2d');
        new Chart(barChartCanvas, barChartConfig);
    </script>

    {{-- HORIZONTAL BAR CHART --}}
    <script>
        // data for the horizontal bar chart 
        const horizontalBarChartData = {
            labels: ['Malaysian', 'Indonesian', 'Singaporean', 'Thai', 'Vietnamese'],
            datasets: [{
                label: 'Number of Passengers',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: [796532, 255507, 568710, 123710, 107710],
            }]
        };

        // Horizontal bar chart configuration
        const horizontalBarChartConfig = {
            type: 'bar', 
            data: horizontalBarChartData,
            options: {
                indexAxis: 'y', 
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            callback: (value) => value.toLocaleString(), // Format the number with commas
                        },
                    },
                },
            },
        };

        // Create and render the horizontal bar chart
        const horizontalBarChartCanvas = document.getElementById('horizontalBarChart').getContext('2d');
        new Chart(horizontalBarChartCanvas, horizontalBarChartConfig);
    </script>
@endsection



{{-- <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @else
                            <div class="alert alert-success">
                                You are logged in!
                            </div>
                        @endif
                    </div>
                </div>
            </div> --}}
