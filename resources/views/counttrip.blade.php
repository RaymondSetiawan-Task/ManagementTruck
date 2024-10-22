@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Trip Information</h2>
    <div class="container py-3 mt-3">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Driver ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Count Trip</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->driver_id }}</td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->total_trips }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection