<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = \App\User::inRandomOrder()->first();
    return [
        'comment' => $faker->realText(400),
        'user_id' => $user->id
    ];
});
