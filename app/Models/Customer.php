<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'user_id',
        'station_id',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
