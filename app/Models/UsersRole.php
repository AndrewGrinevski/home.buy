<?php

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersRole extends Model
{
    protected $fillable = ['user_id','role_id'];

}
