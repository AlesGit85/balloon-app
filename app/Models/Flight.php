<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'date_flights',
        'from',
        'to',
        'pilot',
        'notes',
    ];
}
