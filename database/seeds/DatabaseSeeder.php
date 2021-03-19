<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(BalconiesTableSeeder::class);
        $this->call(BathroomsTableSeeder::class);
        $this->call(BerthsTableSeeder::class);
        $this->call(RepairsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(SeparatedRoomsTableSeeder::class);
        $this->call(TransactionsTableSeeder::class);
        $this->call(WallsTableSeeder::class);
    }
}
