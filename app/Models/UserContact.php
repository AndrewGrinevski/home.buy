<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $fillable = ['name','email','phone','viber_phone'];

    public function sellApartament()
    {
        return $this->hasOne(SellApartament::class);
    }
}

