<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number_of_rooms'];

    public function SellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }
}
