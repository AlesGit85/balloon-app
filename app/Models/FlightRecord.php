<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_id',
        'pilot_id',
        'number',
        'date_flights',
        'start_time',
        'end_time',
        'start_location',
        'end_location',
        'pilot_name',
        'license',
        'crew',
        'passenger_count',
        'passenger_names',
        'registration',
        'balloon_model',
        'hours',
        'fuel',
        'temperature',
        'wind',
        'visibility',
        'weather',
        'flight_description',
        'max_altitude',
        'distance',
        'landing',
        'landing_location',
        'incident',
        'return',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function pilot()
    {
        return $this->belongsTo(Pilot::class);
    }
}
