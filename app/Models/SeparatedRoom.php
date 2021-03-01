<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeparatedRoom extends Model
{
    protected $fillable = ['number_of_separated_rooms'];

    public function sellApartament()
    {
        return $this->hasMany(SellApartament::class);
    }

}
