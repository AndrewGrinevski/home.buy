<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balcony extends Model
{
    protected $fillable = ['type_of_balcony'];

    public function sellApartament()
    {
        return $this->hasMany(SellApartament::class);
    }
}
