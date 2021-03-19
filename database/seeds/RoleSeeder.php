<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          ['role_name'=>'admin'],
            ['role_name'=>'moderator'],
            ['role_name'=>'manager'],
            ['role_name'=>'user']
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate($role);
        }

        $usersRole = [
            [
                'user_id' => '1',
                'role_id' => '1',
            ],
            [
                'user_id' => '2',
                'role_id' => '2',
            ],
            [
                'user_id' => '3',
                'role_id' => '4',
            ],
            [
                'user_id' => '4',
                'role_id' => '4',
            ],
            [
                'user_id' => '5',
                'role_id' => '4',
            ]
        ];

        \Illuminate\Support\Facades\DB::table('users_roles')->insert($usersRole);

    }
}
