<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Trip;
use App\Models\Truck;
use App\Models\Driver;


class TestAPI extends Controller
{
    public function showTripIndexLimit(Request $request)
    {
        $limit = $request->input('limit', 10);
        $offset = $request->input('offset', 0);

        $total_trips = DB::table('trip')->count();

        $show_trip = DB::table('trip')
            ->join('trucks', 'trip.truck_id', '=', 'trucks.truck_id')
            ->join('drivers', 'trip.driver_id', '=', 'drivers.driver_id')
            ->select(
                'trip.trip_id',
                'trip.trip_date',
                'trip.distance',
                'trip.start_location',
                'trip.end_location',
                'trucks.license_plate',
                'trucks.model',
                'drivers.name'
            )
            ->orderBy('trip_id', 'ASC')
            ->limit($limit)
            ->offset($offset)
            ->get()
            ->map(function ($trip) {
                return [
                    'trip_id' => $trip->trip_id,
                    'truck' => [
                        'license_plate' => $trip->license_plate,
                        'model' => $trip->model,
                    ],
                    'driver' => [
                        'name' => $trip->name,
                    ],
                    'start_location' => $trip->start_location,
                    'end_location' => $trip->end_location,
                    'distance' => $trip->distance,
                    'trip_date' => $trip->trip_date,
                ];
            });

        return response()->json([
            'total' => $total_trips,
            'limit' => $limit,
            'offset' => $offset,
            'trips' => $show_trip,
        ]);
    }

    public function showTripIndexPaginate(Request $request)
    {
        $page_size = $request->input('page_size', 10);

        // Fetch trips with related truck and driver
        $show_trip = Trip::with(['truck', 'driver'])
            ->orderBy('trip_id', 'ASC')
            ->paginate($page_size);

        // Map the trips to a more readable format
        $trips = $show_trip->map(function ($trip) {
            return [
                'trip_id' => $trip->trip_id,
                'truck' => $trip->truck ? [
                    'license_plate' => $trip->truck->license_plate,
                    'model' => $trip->truck->model,
                ] : null,
                'driver' => $trip->driver ? [
                    'name' => $trip->driver->name,
                ] : null,
                'start_location' => $trip->start_location,
                'end_location' => $trip->end_location,
                'distance' => $trip->distance,
                'trip_date' => $trip->trip_date,
            ];
        });

        // Return the paginated response
        return response()->json([
            'total' => $show_trip->total(),
            'page_size' => $page_size,
            'last_page' => $show_trip->lastPage(),
            'current_page' => $show_trip->currentPage(),
            'trips' => $trips,
        ]);
    }
}
