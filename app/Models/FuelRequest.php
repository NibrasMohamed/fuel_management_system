<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelRequest extends Model
{
    use HasFactory;

    protected $table = 'fuel_requests';

    protected $fillable = [
        'station_id',
        'fuel_qty',
        'requested_date',
        'expected_time',
        'status',
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
    
}
