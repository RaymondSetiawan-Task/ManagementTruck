@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Trip Information</h2>
    <div class="container py-3 mt-3">
        <div class="d-flex justify-content-between">
            <div>
                <button type="button" class="btn btn-outline-success px-2" data-bs-toggle="modal"
                    data-bs-target="#Add_Trip">
                    <i data-feather="upload"></i>
                    Add Trip Information
                </button>
                <button type="button" class="btn btn-outline-success px-2" data-bs-toggle="modal" data-bs-target="#SearchDriver">
                    <i data-feather="search"></i>
                    Search Driver
                </button>
                <button type="button" class="btn btn-outline-success px-2" onclick="window.location.href='/trips'">
                    <i data-feather="search"></i>
                    Show All Driver
                </button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Action</th>
                <th scope="col">Trip ID</th>
                <th scope="col">License Plate</th>
                <th scope="col">Model</th>
                <th scope="col">Capacity</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Start Location</th>
                <th scope="col">End Location</th>
                <th scope="col">Distance</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dtDriver as $t => $trip)
            <tr>
                <td>
                    <button type="button" class="btn btn-primary btn-sm edit_trip"
                        value="{{ $trip['trip_id'] }}"><i data-feather="edit"></i></button>
                    <p id="p1"></p>
                    <button type="button" class="btn btn-danger btn-sm dlt_trip"
                        value="{{ $trip['trip_id'] }}"><i data-feather="delete"></i></button>
                </td>
                <td>{{ $trip['trip_id'] }}</td>
                <td>{{ $trip['license_plate'] }}</td>
                <td>{{ $trip['model'] }}</td>
                <td>{{ $trip['capacity'] }}</td>
                <td>{{ $trip['name'] }}</td>
                <td>{{ $trip['start_location'] }}</td>
                <td>{{ $trip['end_location'] }}</td>
                <td>{{ $trip['distance'] }}</td>
                <td>{{ $trip['trip_date'] }}</td>
                <td>{{ $trip['status'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $show_trip->onEachSide(5)->links('pagination::bootstrap-4', ['class' => 'btn btn-sm']) }}
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

<!-- Modal Add -->
<div class="modal fade" id="Add_Trip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <select name="truck_id" class="form-select searchaddPlate" id="truck_id" required>
                            <option value="">Select Truck License Plate</option>
                            @foreach ($showtruck as $i => $item)
                            <option value="{{ $item->truck_id }}">{{ $item->license_plate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleDriverName" class="form-label">Select Driver Name</label>
                        <select name="driver_id" class="form-select searchaddDriver" id="driver_id" required>
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
                        <input type="number" name="distance" class="form-control" id="distance" pattern="^\d*(\.\d{0,2})?$" min="0" step="0.01"
                            placeholder="Distance" required>
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

<!-- Modal -->
<div class="modal fade" id="delete_TripInfo" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
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
                        <txtModal></txtModal>
                        <input type="text" name="id_idHidden" id="id_idHidden" hidden>
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


<!-- Modal -->
<div class="modal fade" id="editTrip" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('/trips/update/') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Rules Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="trip_id" id="trip_id" class="form-control">

                        <div class="row">
                            <table class="table">
                                <tr class="form-group">
                                    <td style="border-style:none;"><label>Truck License Plate : </label></td>
                                    <td style="border-style:none;">
                                        <select name="truck_id" class="form-select searcheditPlate" id="truck_id" required>
                                            <option value="">Select Truck License Plate</option>
                                            @foreach ($showtruck as $i => $item)
                                            <option value="{{ $item->truck_id }}">{{ $item->license_plate }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-style:none;"><label>Driver Name : </label></td>
                                    <td style="border-style:none;"><select name="driver_id" class="form-select searcheditDriver" id="driver_id" required>
                                            <option value="">Select Driver Name</option>
                                            @foreach ($showdriver as $i => $item)
                                            <option value="{{ $item->driver_id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                </tr>
                                <tr>
                                    <td style="border-style:none;"><label>Start Location : </label></td>
                                    <td style="border-style:none;"><input type="text" name="start_location"
                                            id="start_location" class="form-control" maxlength="255" required></td>
                                </tr>
                                <tr>
                                    <td style="border-style:none;"><label>End Location : </label></td>
                                    <td style="border-style:none;"><input type="text" name="end_location"
                                            id="end_location" class="form-control" maxlength="255" required></td>
                                </tr>
                                <tr>
                                    <td style="border-style:none;"><label>Distance : </label></td>
                                    <td style="border-style:none;"><input type="number" name="distance"
                                            id="distance" class="form-control" pattern="^\d*(\.\d{0,2})?$" required min="0" step="0.01" required></td>
                                </tr>
                                <tr>
                                    <td style="border-style:none;"><label>Trip Date : </label></td>
                                    <td style="border-style:none;"><input type="date" name="trip_date"
                                            id="trip_date" class="form-control" required></td>
                                </tr>

                            </table>
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
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_trip', function() {

            var trip_id = $(this).val();
            //alert(id);
            $('#editTrip').modal('show');

            $.ajax({
                type: "GET",
                url: "/trips/update/" + trip_id,
                success: function(response) {
                    //alert(response);
                    console.log(response);
                    $('#trip_id').val(trip_id);
                    $('#truck_id').val(response.Trip.license_plate);
                    $('#name').val(response.Trip.name);
                    $('#start_location').val(response.Trip.start_location);
                    $('#end_location').val(response.Trip.end_location);
                    $('#distance').val(response.Trip.distance);
                    $('#trip_date').val(response.Trip.trip_date);
                }
            });

        });

        $(document).on('click', '.dlt_trip', function() {
            var id = $(this).val();
            $("txtModal").html("Are you sure you want to delete Trip id : <b>" + id + "</b> ?");
            $('#id_idHidden').val(id);
            $('#delete_TripInfo').modal('show');

        });

        var select_box_element = document.querySelector('.searchDriver');
        dselect(select_box_element, {
            search: true
        });

        var select_box_element = document.querySelector('.searchaddDriver');
        dselect(select_box_element, {
            search: true
        });
        
        var select_box_element = document.querySelector('.searchaddPlate');
        dselect(select_box_element, {
            search: true
        });

        var select_box_element = document.querySelector('.searcheditPlate');
        dselect(select_box_element, {
            search: true
        });

        var select_box_element = document.querySelector('.searcheditDriver');
        dselect(select_box_element, {
            search: true
        });

    });
</script>
@endsection