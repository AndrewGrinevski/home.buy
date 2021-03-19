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
                'phone' => '+375293344623',
                'email' => 'Admin@gmail.com',
                'email_verified_at' => '2021-03-08 07:36:22',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Moderator',
                'phone' => '+375296734623',
                'email' => 'Moderator@gmail.com',
                'email_verified_at' => '2021-03-08 07:37:22',
                'password' => Hash::make('moderator'),
            ],
            [
                'name' => 'Andrei',
                'phone' => '+375292585380',
                'email' => 'Andrei@gmail.com',
                'email_verified_at' => '2021-03-08 07:26:22',
                'password' => Hash::make('user'),
            ],
            [
                'name' => 'Sasha',
                'phone' => '+375298427843',
                'email' => 'Sasha@gmail.com',
                'email_verified_at' => '2021-03-08 07:23:22',
                'password' => Hash::make('user'),
            ],
            [
                'name' => 'Ivan',
                'phone' => '+375293682384',
                'email' => 'Ivan@gmail.com',
                'email_verified_at' => '2021-03-08 07:45:22',
                'password' => Hash::make('user'),
            ]
        ];

        \Illuminate\Support\Facades\DB::table('users')->insert($admin);
    }
}
