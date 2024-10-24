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
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('truck_id', 1)->primary();
            $table->string('license_plate', 100);
            $table->string('model', 100);
            $table->decimal('capacity', 7,2);
            $table->date('exp_kir');
            $table->enum('status', ['Available', 'On Trip'])->default('Available');
            $table->timestamps();

            $table->index(['truck_id']);
            $table->index(['license_plate']);
            $table->index(['model']);
            $table->index(['capacity']);
            $table->index(['exp_kir']);
            $table->index(['status']);   
        });

        DB::table('trucks')->insert([
            ['license_plate' => 'B 6670 CD', 'model' => 'Isuzu', 'capacity'=> 60, 'exp_kir' => '2024-11-24', 'status' => 'Available', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['license_plate' => 'B 6870 AD', 'model' => 'Honda', 'capacity'=> 60, 'exp_kir' => '2024-10-27', 'status' => 'Available', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['license_plate' => 'B 6980 BD', 'model' => 'Suzuki', 'capacity'=> 60, 'exp_kir' => '2025-01-29', 'status' => 'On Trip', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['license_plate' => 'B 7070 ED', 'model' => 'Mitsubishi', 'capacity'=> 75, 'exp_kir' => '2024-10-27', 'status' => 'Available', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['license_plate' => 'B 7170 FD', 'model' => 'Toyota', 'capacity'=> 80, 'exp_kir' => '2024-10-10', 'status' => 'On Trip', 'created_at' => Carbon::now('Asia/Jakarta')]
        ]);
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
