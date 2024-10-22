<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Trip;
use App\Models\Truck;
use App\Models\Driver;


class DashboardController extends Controller
{
    public function show()
    {
       // Total trips today
       $totalTripsToday = Trip::whereDate('trip_date', Carbon::today())->count();

       $trucksExpiringKIR = Truck::where('exp_kir', '<=', Carbon::now()->addDays(30))->count();

       $trucksExpiringSIM = Driver::where('exp_sim', '<=', Carbon::now()->addDays(30))->count();

       return view('home', compact('totalTripsToday', 'trucksExpiringKIR', 'trucksExpiringSIM'));
    }
}
