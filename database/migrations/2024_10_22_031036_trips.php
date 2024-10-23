<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->increments('trip_id', 1)->primary();
            $table->unsignedInteger('truck_id');
            $table->unsignedInteger('driver_id');

            $table->string('start_location', 255);
            $table->string('end_location', 255);
            $table->decimal('distance', 7, 2);
            $table->date('trip_date');
            $table->timestamps();

            $table->foreign('truck_id')->references('truck_id')->on('trucks')->onDelete('cascade');
            $table->foreign('driver_id')->references('driver_id')->on('drivers')->onDelete('cascade');

            $table->index(['trip_id']);
            $table->index(['start_location']);
            $table->index(['end_location']);
            $table->index(['distance']);
            $table->index(['trip_date']);
        });

        DB::table('trip')->insert([
            ['truck_id' => 1, 'driver_id' => 1, 'start_location' => 'Location A', 'end_location' => 'Location B', 'distance' => 120, 'trip_date' => '2024-01-01', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 3, 'driver_id' => 3, 'start_location' => 'Location C', 'end_location' => 'Location D', 'distance' => 100, 'trip_date' => '2024-10-27', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 2, 'driver_id' => 2, 'start_location' => 'Location E', 'end_location' => 'Location F', 'distance' => 200, 'trip_date' => '2024-10-23', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 3, 'driver_id' => 1, 'start_location' => 'Location M', 'end_location' => 'Location N', 'distance' => 210, 'trip_date' => '2024-05-15', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 4, 'driver_id' => 3, 'start_location' => 'Location EE', 'end_location' => 'Location FF', 'distance' => 140, 'trip_date' => '2024-10-20', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 2, 'driver_id' => 3, 'start_location' => 'Location GG', 'end_location' => 'Location HH', 'distance' => 130, 'trip_date' => '2024-10-22', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 3, 'driver_id' => 3, 'start_location' => 'Location II', 'end_location' => 'Location JJ', 'distance' => 150, 'trip_date' => '2024-10-23', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 5, 'driver_id' => 2, 'start_location' => 'Location O', 'end_location' => 'Location P', 'distance' => 220, 'trip_date' => '2024-10-30', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 3, 'driver_id' => 2, 'start_location' => 'Location Q', 'end_location' => 'Location R', 'distance' => 160, 'trip_date' => '2024-10-15', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 1, 'driver_id' => 2, 'start_location' => 'Location S', 'end_location' => 'Location T', 'distance' => 130, 'trip_date' => '2024-10-20', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 1, 'driver_id' => 3, 'start_location' => 'Location 1', 'end_location' => 'Location 2', 'distance' => 110, 'trip_date' => '2024-10-05', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 2, 'driver_id' => 3, 'start_location' => 'Location 3', 'end_location' => 'Location 4', 'distance' => 125, 'trip_date' => '2024-10-10', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 4, 'driver_id' => 1, 'start_location' => 'Location G', 'end_location' => 'Location H', 'distance' => 150, 'trip_date' => '2024-10-25', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 5, 'driver_id' => 1, 'start_location' => 'Location I', 'end_location' => 'Location J', 'distance' => 180, 'trip_date' => '2024-10-26', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 2, 'driver_id' => 1, 'start_location' => 'Location K', 'end_location' => 'Location L', 'distance' => 90, 'trip_date' => '2024-04-22', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 4, 'driver_id' => 5, 'start_location' => 'Location KK', 'end_location' => 'Location LL', 'distance' => 160, 'trip_date' => '2024-10-24', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 3, 'driver_id' => 3, 'start_location' => 'Location 5', 'end_location' => 'Location 6', 'distance' => 140, 'trip_date' => '2024-10-12', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 4, 'driver_id' => 3, 'start_location' => 'Location 7', 'end_location' => 'Location 8', 'distance' => 155, 'trip_date' => '2024-10-18', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 3, 'driver_id' => 4, 'start_location' => 'Location Y', 'end_location' => 'Location Z', 'distance' => 250, 'trip_date' => '2024-09-20', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 2, 'driver_id' => 4, 'start_location' => 'Location AA', 'end_location' => 'Location BB', 'distance' => 140, 'trip_date' => '2024-10-01', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 5, 'driver_id' => 4, 'start_location' => 'Location CC', 'end_location' => 'Location DD', 'distance' => 90, 'trip_date' => '2024-10-15', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 1, 'driver_id' => 2, 'start_location' => 'Location U', 'end_location' => 'Location V', 'distance' => 170, 'trip_date' => '2024-09-05', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 5, 'driver_id' => 2, 'start_location' => 'Location W', 'end_location' => 'Location X', 'distance' => 180, 'trip_date' => '2024-10-28', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['truck_id' => 5, 'driver_id' => 3, 'start_location' => 'Location 9', 'end_location' => 'Location 10', 'distance' => 160, 'trip_date' => '2024-10-21', 'created_at' => Carbon::now('Asia/Jakarta')],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip');
    }
};
