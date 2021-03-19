<?php

use Illuminate\Database\Seeder;

class WallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $walls = [
            ['type_of_walls' => 'Панельный'],
            ['type_of_walls' => 'Монолитный'],
            ['type_of_walls' => 'Кирпичный'],
            ['type_of_walls' => 'Каркасно - блочный'],
            ['type_of_walls' => 'Силикатный блоки'],
            ['type_of_walls' => 'Бревенчатый'],
            ['type_of_walls' => 'Блок - комнаты']
        ];

        \Illuminate\Support\Facades\DB::table('walls')->insert($walls);
    }
}
