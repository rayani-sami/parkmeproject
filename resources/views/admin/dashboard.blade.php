@extends('admin.layout.layout')
@section('content')

<div class="container-fluid">

    <!-- Add Order -->
    <div class="row">
        <div class="col-xl-6">
            <div class="row">
                <!-- Total Parkings -->
                <div class="col-sm-6">
                    <div class="card fun">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="num-text text-black font-w600">{{ $totalParkings }}</h2>
                                    <span class="fs-14">Total Parkings</span>
                                </div>
                                <i class="fa fa-car fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Users -->
                <div class="col-sm-6">
                    <div class="card fun">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="num-text text-black font-w600">{{ $totalUsers }}</h2>
                                    <span class="fs-14">Total Users</span>
                                </div>
                                <i class="fa fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Reservations -->
                <div class="col-sm-6">
                    <div class="card fun">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="num-text text-black font-w600">{{ $totalReservations }}</h2>
                                    <span class="fs-14">Total Reservations</span>
                                </div>
                                <i class="fa fa-calendar-check fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Active Reservations -->
                <div class="col-sm-6">
                    <div class="card fun">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="media-body me-3">
                                    <h2 class="num-text text-black font-w600">{{ $activeReservations }}</h2>
                                    <span class="fs-14">Active Reservations</span>
                                </div>
                                <i class="fa fa-bell fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header border-0 shadow-sm">
                    <h4 class="fs-20 text-black font-w600">Reservations Over Time</h4>
                </div>
                <div class="card-body text-center">
                    <canvas id="reservationsChart" class="max-h80"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = {!! json_encode($labels) !!};
        const data = {!! json_encode($data) !!};

        const ctx = document.getElementById('reservationsChart').getContext('2d');
        const reservationsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Reservations per Day',
                    data: data,
                    backgroundColor: 'rgba(41, 83, 232, 0.2)',
                    borderColor: '#2953E8',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
