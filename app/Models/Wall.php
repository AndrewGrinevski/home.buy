<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    protected $fillable = ['type_of_walls'];

    public function SellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }

}
