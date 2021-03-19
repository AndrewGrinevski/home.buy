<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['town'];

    public function SellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }
}
