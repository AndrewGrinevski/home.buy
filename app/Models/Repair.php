<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = ['type_of_repairs'];

    public function SellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }
}
