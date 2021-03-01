<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['first_img_name','second_img_name','third_img_name','four_img_name',
        'five_img_name','six_img_name','seven_img_name','eight_img_name',];

    public function sellApartament()
    {
        return $this->hasOne(SellApartament::class, 'images_id');
    }
}
