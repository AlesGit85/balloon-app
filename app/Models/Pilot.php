<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_ID', 
        'user_name', 
        'typ_licence', 
        'number_licence', 
        'vacation_date_from', 
        'vacation_date_to'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID');
    }
}