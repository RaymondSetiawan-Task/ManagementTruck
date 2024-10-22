<?php
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip', function (Blueprint $table) {
            $table->integer('trip_id')->primary();
            $table->integer('truck_id');
            $table->integer('driver_id');

            $table->string('start_location', 255);
            $table->string('end_location', 255);
            $table->decimal('distance', 7,2);
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
            ['trip_id' => '1', 'truck_id' => '1', 'driver_id' => '1', 'start_location'=> 'Location A', 'end_location' => 'Location B', 'distance' => '120', 'trip_date'=> '2024-01-01', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['trip_id' => '2', 'truck_id' => '3', 'driver_id' => '3', 'start_location'=> 'Location C', 'end_location' => 'Location D', 'distance' => '100', 'trip_date'=> '2024-10-27', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['trip_id' => '3', 'truck_id' => '2', 'driver_id' => '2', 'start_location'=> 'Location E', 'end_location' => 'Location F', 'distance' => '200', 'trip_date'=> '2024-10-24', 'created_at' => Carbon::now('Asia/Jakarta')],
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
