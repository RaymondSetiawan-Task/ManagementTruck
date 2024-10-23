<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\Truck;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;


class TripControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCannotCreateTripWithTruckUnderMaintenance()
    {
        // Membuat driver dan truck dalam status maintenance
        $driver = Driver::factory()->create();
        $truck = Truck::factory()->create(['status' => 'Maintenance']);

        // Mencoba membuat trip dengan truck yang sedang dalam maintenance
        $this->expectException(\Exception::class);
        Trip::create([
            'trip_id' => 3,
            'truck_id' => $truck->id,
            'driver_id' => $driver->id,
            'start_location' => 'Location E',
            'end_location' => 'Location F',
            'distance' => 150,
            'trip_date' => now(),
        ]);
    }

    public function testCannotCreateTripWithDriverOnAnotherTrip()
    {
        // Membuat driver dan truck menggunakan factory
        $driver = Driver::factory()->create();
        $truck = Truck::factory()->create(['status' => 'Available']); // Truck dalam status 'Available'

        // Membuat trip pertama untuk driver
        $trip = Trip::create([
            'truck_id' => $truck->truck_id,
            'driver_id' => $driver->driver_id,
            'start_location' => 'Location A',
            'end_location' => 'Location B',
            'distance' => 100,
            'trip_date' => now(),
        ]);

        // Mencoba membuat trip kedua dengan driver yang sedang dalam trip
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        $this->expectExceptionMessage('Driver is currently on another trip.');

        // Coba membuat trip kedua
        Trip::create([
            'truck_id' => $trip->truck_id, 
            'driver_id' => $driver->driver_id,
            'start_location' => 'Location C',
            'end_location' => 'Location D',
            'distance' => 150,
            'trip_date' => now(),
        ]);
    }
}
