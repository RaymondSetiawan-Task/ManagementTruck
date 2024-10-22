<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Trip;
use App\Models\Truck;
use App\Models\Driver;


class TripsController extends Controller
{
    public function showTripIndex()
    {
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
                'drivers.name',
                'trucks.truck_id',
            )
            ->orderBy('trip_id', 'ASC')
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
        return response()->json($show_trip);
    }

    public function showTrip()
    {
        $showdriver = DB::table('drivers')->get();
        $showtruck = DB::table('trucks')->get();

        $show_trip = DB::table('trip')
            ->join('trucks', 'trip.truck_id', '=', 'trucks.truck_id')
            ->join('drivers', 'trip.driver_id', '=', 'drivers.driver_id')
            ->orderBy('trip_id', 'ASC')
            ->get();

        $dtDriver = [];
        foreach ($show_trip as $i => $u) {
            $dtDriver[$i]['trip_id'] = $u->trip_id;
            $dtDriver[$i]['license_plate'] = $u->license_plate;
            $dtDriver[$i]['model'] = $u->model;
            $dtDriver[$i]['capacity'] = $u->capacity;
            $dtDriver[$i]['name'] = $u->name;
            $dtDriver[$i]['start_location'] = $u->start_location;
            $dtDriver[$i]['end_location'] = $u->end_location;
            $dtDriver[$i]['distance'] = $u->distance;
            $dtDriver[$i]['trip_date'] = $u->trip_date;
            $dtDriver[$i]['status'] = $u->status;
        }
        //dd($show_trip);

        return view('trips', compact('dtDriver', 'showdriver', 'showtruck'));
    }

    public function showDriver(Request $request)
    {
        $name = $request->selectDriver;
        if ($name != null) {

            $showdriver = DB::table('drivers')->get();
            $showtruck = DB::table('trucks')->get();

            $show_trip = DB::table('trip')
                ->join('trucks', 'trip.truck_id', '=', 'trucks.truck_id')
                ->join('drivers', 'trip.driver_id', '=', 'drivers.driver_id')
                ->where('drivers.name', $name)
                ->orderBy('trip_id', 'ASC')
                ->get();

            $dtDriver = [];
            foreach ($show_trip as $i => $u) {
                $dtDriver[$i]['trip_id'] = $u->trip_id;
                $dtDriver[$i]['license_plate'] = $u->license_plate;
                $dtDriver[$i]['model'] = $u->model;
                $dtDriver[$i]['capacity'] = $u->capacity;
                $dtDriver[$i]['name'] = $u->name;
                $dtDriver[$i]['start_location'] = $u->start_location;
                $dtDriver[$i]['end_location'] = $u->end_location;
                $dtDriver[$i]['distance'] = $u->distance;
                $dtDriver[$i]['trip_date'] = $u->trip_date;
                $dtDriver[$i]['status'] = $u->status;
            }

            //dd($show_trip);

            return view('trips', compact('dtDriver', 'showdriver', 'showtruck'));
        } else {
            Toast('Please input Driver Name', 'info');
            return redirect('/trips');
        }
    }

    public function storeTrip(Request $request)
    {
        //dd($request);
        $request->validate([
            'truck_id' => 'required',
            'driver_id' => 'required',
            'start_location' => 'required',
            'end_location' => 'required',
            'distance' => 'required',
            'trip_date' => 'required',
        ]);

        $truck_id = $request->truck_id;
        $driver_id = $request->driver_id;
        $start_location = $request->start_location;
        $end_location = $request->end_location;
        $distance = $request->distance;
        $trip_date = $request->trip_date;


        // $showdriver = DB::table('drivers')->get();
        // $showtruck = DB::table('trucks')->get();

        $insert_Trip = DB::table('trip')->insert([
            'truck_id' => $truck_id,
            'driver_id' => $driver_id,
            'start_location' => $start_location,
            'end_location' => $end_location,
            'distance' => $distance,
            'trip_date' => $trip_date,
            'created_at' => Carbon::now('Asia/Jakarta'),
        ]);
        toast('Trip Information Added Successfully', 'success');

        //dd($show_trip);

        return redirect()->back();
    }

    public function delete_trip(Request $request)
    {
        try {
            $delete_tripInfo = $request->id_idHidden;
            $query = Trip::where('trip_id', $delete_tripInfo)->delete();

            Toast('Data has been deleted', 'success');
            return redirect()->back();
        } catch (\Illuminate\Database\QueryException $ex) {
            //dd($ex->getMessage()); 
            $errorCode = $ex->errorInfo[1];
            $errorMessage = $ex->errorInfo[2];

            toast($errorMessage, 'error');
            return redirect()->back();
        }
    }

    public function edittrip($id)
    {
        $editTrip = DB::table('trip')
            ->join('trucks', 'trip.truck_id', '=', 'trucks.truck_id')
            ->join('drivers', 'trip.driver_id', '=', 'drivers.driver_id')
            ->where('trip_id', $id)
            ->first();

        return response()->json([
            'Trip' => $editTrip,
        ]);
    }

    public function updatetrip(Request $request)
    {

        //dd($request);
        $trip_id = $request->input('trip_id');
        $truck_id = $request->input('truck_id');
        $driver_id = $request->input('driver_id');
        $start_location = $request->input('start_location');
        $end_location = $request->input('end_location');
        $distance = $request->input('distance');
        $trip_date = $request->input('trip_date');

        try {
            $query = DB::table('trip')->where('trip_id', $trip_id)->update([
                'truck_id' => $truck_id,
                'driver_id' => $driver_id,
                'start_location' => $start_location,
                'end_location' => $end_location,
                'distance' => $distance,
                'trip_date' => $trip_date,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);

            Toast('Data has been updated', 'success');
            return redirect('/trips');
        } catch (\Illuminate\Database\QueryException $ex) {
            //dd($ex->getMessage()); 
            $errorCode = $ex->errorInfo[1];
            $errorMessage = $ex->errorInfo[2];


            toast($errorMessage, 'error');

            return redirect()->back();
        }
    }



    public function countTrip()
    {
        $drivers = Driver::select('drivers.driver_id', 'drivers.name', DB::raw('COUNT(trip.trip_id) AS total_trips'))
            ->join('trip', 'drivers.driver_id', '=', 'trip.driver_id')
            ->where('trip.trip_date', '>=', Carbon::now()->subMonth())
            ->groupBy('drivers.driver_id', 'drivers.name')
            ->having('total_trips', '>', 5)
            ->get();

        return view('counttrip', compact('drivers'));
    }
}
