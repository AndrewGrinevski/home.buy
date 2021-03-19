<?php

use Illuminate\Database\Seeder;

class BalconiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $balconies = [
            ['type_of_balcony' => 'Балкон'],
            ['type_of_balcony' => 'Лоджия'],
            ['type_of_balcony' => 'Нет']
        ];

        \Illuminate\Support\Facades\DB::table('balconies')->insert($balconies);
    }
}
