<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['first_img_name','second_img_name','third_img_name','four_img_name',
        'five_img_name'];


    public function sellApartament()
    {
        return $this->hasOne(SellApartament::class);
    }

}
