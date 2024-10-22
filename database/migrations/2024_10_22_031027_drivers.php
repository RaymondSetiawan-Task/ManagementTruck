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
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('driver_id', 1)->primary();
            $table->string('name', 255);
            $table->string('license_number', 50);
            $table->date('exp_sim');
            $table->integer('experience_years');
            $table->timestamps();

            $table->index(['driver_id']);
            $table->index(['name']);
            $table->index(['license_number']);
            $table->index(['exp_sim']);
            $table->index(['experience_years']);
        });

        DB::table('drivers')->insert([
            ['driver_id' => 1, 'name' => 'John Doe', 'license_number' => 'B1234XYZ ', 'exp_sim'=> '2024-12-25', 'experience_years' => '5','created_at' => Carbon::now('Asia/Jakarta')],
            ['driver_id' => 2, 'name' => 'Thomas', 'license_number' => 'K6789ABC', 'exp_sim'=> '2025-01-14', 'experience_years' => '3', 'created_at' => Carbon::now('Asia/Jakarta')],
            ['driver_id' => 3, 'name' => 'Alpha', 'license_number' => 'K6789BDS', 'exp_sim'=> '2024-10-31', 'experience_years' => '4', 'created_at' => Carbon::now('Asia/Jakarta')]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
