<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['account_number', 'amount', 'booking_id'];
    public function Booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}
