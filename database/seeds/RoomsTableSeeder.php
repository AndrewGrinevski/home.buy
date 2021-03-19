<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [];
        for ($i=1; $i<=7; $i++) {
            $rooms[] = [
                'number_of_rooms' => $i
            ];
        }

        \Illuminate\Support\Facades\DB::table('rooms')->insert($rooms);
    }
}
