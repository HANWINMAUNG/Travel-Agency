<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = ['package_id', 'number_of_person', 'user_id', 'note', 'date_of_travel', 'payment_method'];

    public function Package() {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Payment() {
        return $this->hasMany(Payment::class, 'id');
    }
}


