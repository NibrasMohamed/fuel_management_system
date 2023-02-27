<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $table = 'stations';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'location_id',
        'station_name',
        'address',
        'fuel_stock',
        'fuel_capacity',
        'status'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function tokens()
    {
        return $this->hasMany(Token::class, 'station_id');
    }

    public function fuelRequests()
    {
        return $this->hasMany(FuelRequest::class, 'station_id');
    }

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'station_id');
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'station_id');
    }
    
}
