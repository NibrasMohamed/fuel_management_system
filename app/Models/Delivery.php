<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'deliveries';

    protected $fillable = [
        'token_id',
        'employee_id',
        'station_id',
        'status'
    ];

    public function token()
    {
        return $this->belongsTo(Token::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
