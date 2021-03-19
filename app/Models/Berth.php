<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berth extends Model
{
    protected $fillable = ['number_of_berths'];

    public function SellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }
}
