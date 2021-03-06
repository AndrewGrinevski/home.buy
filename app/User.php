<?php

namespace App;

use App\Models\SellApartment;
use App\Traits\RolesTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFavorite\Traits\Favoriter;


class User extends Authenticatable implements MustVerifyEmail
{
    use Favoriter;
    use Notifiable;
    use RolesTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sellApartment()
    {
        return $this->hasMany(SellApartment::class);
    }



}
