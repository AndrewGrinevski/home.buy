<?php

use Illuminate\Database\Seeder;

class RepairsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $repairs = [
            ['type_of_repairs' => 'С отделкой'],
            ['type_of_repairs' => 'Без отделки'],
            ['type_of_repairs' => 'Отличный'],
            ['type_of_repairs' => 'Хороший'],
            ['type_of_repairs' => 'Удовлетворительный'],
            ['type_of_repairs' => 'Косметический'],
            ['type_of_repairs' => 'Евро'],
            ['type_of_repairs' => 'Дизайнерский']
        ];

        \Illuminate\Support\Facades\DB::table('repairs')->insert($repairs);
    }
}
