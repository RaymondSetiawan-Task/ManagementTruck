<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Trip;
use App\Models\Truck;
use App\Models\Driver;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TripTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function createtrip_successfully()
    {
        $truck = Truck::create([
            'license_plate' => 'B 1234 XYZ',
            'model' => 'Isuzu',
            'capacity' => 1000,
            'exp_kir' => now()->addYear(),
            'status' => 'On trip'
        ]);

        $driver = Driver::create([
            'name' => 'John Doel',
            'license_number' => 'AB123456',
            'exp_sim' => now()->addYear(),
            'experience_years' => 5
        ]);

        $trip = Trip::create([
            'truck_id' => $truck->id,
            'driver_id' => $driver->id,
            'start_location' => 'Location A',
            'end_location' => 'Location B',
            'distance' => 100,
            'trip_date' => now(),
        ]);

        $this->assertDatabaseHas('trip', [
            'trip_id' => $trip->id,
            'truck_id' => $truck->id,
            'driver_id' => $driver->id,
            'start_location' => 'Location A',
            'end_location' => 'Location B',
            'distance' => 100,
        ]);
    }

    /** @test */
    public function fails_trip_withInvalid_DriverID()
    {
        $driver = Driver::create([
            'name' => 'John Doe',
            'license_number' => 'AB123456',
            'exp_sim' => now()->addYear(),
            'experience_years' => 5
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Trip::create([
            'truck_id' => 999, // ID truck yang tidak ada
            'driver_id' => $driver->id,
            'start_location' => 'Location A',
            'end_location' => 'Location B',
            'distance' => 100,
            'trip_date' => now(),
        ]);
    }

    /** @test */
    public function fails_trip_withInvalid_TruckID()
    {
        $truck = Truck::create([
            'license_plate' => 'B 1234 XYZ',
            'model' => 'Model A',
            'capacity' => 1000,
            'exp_kir' => now()->addYear(),
            'status' => 'available'
        ]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Trip::create([
            'truck_id' => $truck->id,
            'driver_id' => 999, // ID driver yang tidak ada
            'start_location' => 'Location A',
            'end_location' => 'Location B',
            'distance' => 100,
            'trip_date' => now(),
        ]);
    }
}
