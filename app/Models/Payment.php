<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_id',
        'amount',
        'status',
    ];
    
    public function request()
    {
        return $this->belongsTo(Token::class);
    }

}
