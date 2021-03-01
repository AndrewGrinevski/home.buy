<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = ['type_of_repairs'];

    public function balcony()
    {
        return $this->belongsTo(Balcony::class, 'type_of_balcony_id');
    }
}
