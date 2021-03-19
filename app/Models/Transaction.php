<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['type_of_transaction'];

    public function SellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }
}
