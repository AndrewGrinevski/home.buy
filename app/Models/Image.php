<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['apartment_id', 'image'];


    public function sellApartament()
    {
        return $this->belongsTo(SellApartament::class, 'apartment_id', 'id');
    }

}
