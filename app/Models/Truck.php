<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Truck extends Model
{
    use HasFactory;

    public $table = "trucks";

    protected $fillable = [
      'truck_id',
      'license_plate',
      'model',
      'capacity',
      'exp_kir',
      'status',
      'created_at',
      'updated_at'
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
