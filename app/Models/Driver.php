<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Driver extends Model
{
    use HasFactory;

    public $table = "drivers";
    protected $primaryKey = 'driver_id';
    
    protected $fillable = [
      'driver_id',
      'name',
      'license_number',
      'exp_sim',
      'experience_years',
      'created_at',
      'updated_at'
    ];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
