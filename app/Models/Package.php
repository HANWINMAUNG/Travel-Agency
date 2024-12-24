<?php

namespace App\Models;

use App\Models\City;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [ ];
    public function Category()
    { 
        return $this->belongsToMany(Category::class);
    }
    

    public function City()
    {
        return $this->hasMany(City::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = strtolower(Str::slug($value));
    }

    public function Booking()
    {
        return $this->hasMany(Booking::class, 'id');
    }
}
