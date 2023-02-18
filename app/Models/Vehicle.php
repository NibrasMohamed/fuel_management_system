<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    
    protected $table = 'vehicles';
    protected $fillable = ['registration_number', 'customer_id', 'type_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function type()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
