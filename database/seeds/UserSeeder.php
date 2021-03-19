<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'Admin',
                'phone' => '33333333',
                'email' => 'Admin@gmail.com',
                'email_verified_at' => '2021-03-08 07:36:22',
                'password' => Hash::make('password'),
            ]
        ];

        \Illuminate\Support\Facades\DB::table('users')->insert($admin);
        factory(User::class, 100)->create();
    }
}
