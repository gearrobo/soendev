<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $table = 'device_sensors';

    protected $fillable = ['name', 'api_key', 'status', 'temperature', 'humidity', 'latitude', 'longitude'];
}
