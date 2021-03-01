<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bathroom extends Model
{
    protected $fillable = ['type_of_bathrooms'];

    public function sellApartament()
    {
        return $this->hasMany(SellApartament::class);
    }
}

