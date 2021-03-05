<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berth extends Model
{
    protected $fillable = ['number_of_berths'];

    public function sellApartament()
    {
        return $this->hasMany(SellApartament::class);
    }
}
