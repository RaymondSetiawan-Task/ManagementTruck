@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Trip Information</h2>
    <div class="container py-3 mt-3">
        <div class="d-flex justify-content-between">
            <div>
                <button type="button" class="btn btn-outline-success px-2" data-bs-toggle="modal"
                    data-bs-target="#addtrip">
                    <i data-feather="upload"></i>
                    Add Trip Information
                </button>
                <button type="button" class="btn btn-outline-success px-2" data-bs-toggle="modal" data-bs-target="#SearchDriver">
                    <i data-feather="search"></i>
                    Search Driver
                </button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Trip ID</th>
                <th scope="col">License Plate</th>
                <th scope="col">Model</th>
                <th scope="col">Capacity</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Start Location</th>
                <th scope="col">End Location</th>
                <th scope="col">Distance</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dtDriver as $t => $trip)
            <tr>
                <td>{{ $trip['trip_id'] }}</td>
                <td>{{ $trip['license_plate'] }}</td>
                <td>{{ $trip['model'] }}</td>
                <td>{{ $trip['capacity'] }}</td>
                <td>{{ $trip['name'] }}</td>
                <td>{{ $trip['start_location'] }}</td>
                <td>{{ $trip['end_location'] }}</td>
                <td>{{ $trip['distance'] }}</td>
                <td>{{ $trip['trip_date'] }}</td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm edit_trip" value="{{ $trip['trip_id'] }}">
                        <i data-feather="edit"></i>
                    </button>
                    <p id="p1"></p>
                    <button type="button" class="btn btn-danger btn-sm dlt_trip" value="{{ $trip['trip_id'] }}">
                        <i data-feather="delete"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="SearchDriver" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/trips/showDriverName" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Driver</label>
                        <select name="selectDriver" class="form-select searchDriver" id="selectDriver">
                            <option value="">Select Driver Name</option>
                            @foreach ($showdriver as $i => $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-primary"><i data-feather="send"></i>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delete_trip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/trips/delete/') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p id="txtModal"></p>
                        <input type="hidden" name="trip_idHidden" id="trip_idHidden">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger"><i data-feather="check"></i> Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit_trip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/trips/add') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Trip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleTruckID" class="form-label">Truck license Plate</label>
                        <select name="truck_id" class="form-select" id="truck_id" required>
                            <option value="">Select Truck license Plate</option>
                            @foreach ($showtruck as $i => $item)
                            <option value="{{ $item->truck_id }}">{{ $item->license_plate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleDriverName" class="form-label">Select Driver Name</label>
                        <select name="driver_id" class="form-select" id="driver_id" required>
                            <option value="">Select Driver Name</option>
                            @foreach ($showdriver as $i => $item)
                            <option value="{{ $item->driver_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleStartLocation" class="form-label">Start Location</label>
                        <input type="text" name="start_location" class="form-control" id="start_location"
                            placeholder="Start Location">
                    </div>
                    <div class="mb-3">
                        <label for="exampleEndLocation" class="form-label">End Location</label>
                        <input type="text" name="end_location" class="form-control" id="end_location"
                            placeholder="End Location">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDistance" class="form-label">Distance</label>
                        <input type="number" name="distance" class="form-control" id="distance"
                            placeholder="Distance">
                    </div>
                    <div class="mb-3">
                        <label for="exampleTripDate" class="form-label">Distance</label>
                        <input type="date" name="trip_date" class="form-control" id="trip_date"
                            placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-primary"><i data-feather="send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="addtrip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/trips/add') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Trip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleTruckID" class="form-label">Truck License Plate</label>
                        <select name="truck_id" class="form-select" id="truck_id" required>
                            <option value="">Select Truck License Plate</option>
                            @foreach ($showtruck as $i => $item)
                            <option value="{{ $item->truck_id }}">{{ $item->license_plate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleDriverName" class="form-label">Select Driver Name</label>
                        <select name="driver_id" class="form-select" id="driver_id" required>
                            <option value="">Select Driver Name</option>
                            @foreach ($showdriver as $i => $item)
                            <option value="{{ $item->driver_id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleStartLocation" class="form-label">Start Location</label>
                        <input type="text" name="start_location" class="form-control" id="start_location"
                            placeholder="Start Location">
                    </div>
                    <div class="mb-3">
                        <label for="exampleEndLocation" class="form-label">End Location</label>
                        <input type="text" name="end_location" class="form-control" id="end_location"
                            placeholder="End Location">
                    </div>
                    <div class="mb-3">
                        <label for="exampleDistance" class="form-label">Distance</label>
                        <input type="number" name="distance" class="form-control" id="distance"
                            placeholder="Distance">
                    </div>
                    <div class="mb-3">
                        <label for="exampleTripDate" class="form-label">Date Trip</label>
                        <input type="date" name="trip_date" class="form-control" id="trip_date"
                            placeholder="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-primary"><i data-feather="send"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    var select_box_element = document.querySelector('.searchDriver');
    dselect(select_box_element, {
        search: true
    });

    $(document).ready(function() {
        // Handle delete trip
        $(document).on('click', '.dlt_trip', function() {
            var trip_id = $(this).val();
            $("#txtModal").html("Are you sure you want to delete Trip ID: <b>" + trip_id + "</b>?");
            $('#trip_idHidden').val(trip_id);
            $('#delete_trip').modal('show');
        });

        // Handle edit trip
        $(document).on('click', '.edit_trip', function() {
            var trip_id = $(this).val();
            // Fetch trip data (this can be done via AJAX, but for simplicity, assume you're getting it from an array)
            // You should replace the following lines with actual data retrieval
            $('#edit_trip_id').val(trip_id);
            $('#edit_start_location').val('Sample Start'); // Replace with actual data
            $('#edit_end_location').val('Sample End'); // Replace with actual data
            $('#edit_distance').val('100'); // Replace with actual data
            $('#edit_trip_date').val('2024-01-01'); // Replace with actual data
            $('#edit_trip').modal('show');
        });
    });
</script>
@endsection