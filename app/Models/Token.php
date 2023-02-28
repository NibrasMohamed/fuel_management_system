<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    use HasFactory;

    protected $table = 'tokens';

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'station_id',
        'fuel_quantity',
        'expected_time',
        'status',
        'payment',
        'date',
        'qr_code'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
