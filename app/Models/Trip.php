<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\ValidationException;

class Trip extends Model
{
    use HasFactory;

    public $table = "trip";
    protected $primaryKey = 'trip_id';

    protected $fillable = [
        'trip_id',
        'truck_id',
        'driver_id',
        'start_location',
        'end_location',
        'distance',
        'trip_date',
        'created_at',
        'updated_at'
    ];

    public function truck()
    {
        return $this->belongsTo(Truck::class, 'truck_id');
    }
    
    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
