@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Dashboard</h2>
    <div class="row">
        <!-- Total Trips Today -->
        <div class="col-md-4 mb-4">
            <div class="card text-dark bg-light border-primary shadow-sm">
                <div class="card-header d-flex align-items-center">
                    <i class="lni lni-car fs-2 me-2 text-primary"></i>
                    <span>Total Trips Today</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title fs-1">{{ $totalTripsToday }}</h5>
                    <p class="card-text">Trips completed today.</p>
                </div>
            </div>
        </div>

        <!-- Trucks Expiring KIR -->
        <div class="col-md-4 mb-4">
            <div class="card text-dark bg-light border-warning shadow-sm">
                <div class="card-header d-flex align-items-center">
                    <i class="lni lni-alarm-clock fs-2 me-2 text-warning"></i>
                    <span>Trucks Expiring KIR</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title fs-1">{{ $trucksExpiringKIR }}</h5>
                    <p class="card-text">Trucks nearing KIR expiration.</p>
                </div>
            </div>
        </div>

        <!-- Trucks Expiring SIM -->
        <div class="col-md-4 mb-4">
            <div class="card text-dark bg-light border-danger shadow-sm">
                <div class="card-header d-flex align-items-center">
                    <i class="lni lni-warning fs-2 me-2 text-danger"></i>
                    <span>Trucks Expiring SIM</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title fs-1">{{ $trucksExpiringSIM }}</h5>
                    <p class="card-text">Trucks nearing SIM expiration.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
// Optional: Any additional scripts for the dashboard
</script>
@endsection
