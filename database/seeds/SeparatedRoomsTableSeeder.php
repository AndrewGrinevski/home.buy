<?php

use Illuminate\Database\Seeder;

class SeparatedRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $separatedRooms = [];

        for ($i=1; $i<=7; $i++) {
            $separatedRooms[] = [
                'number_of_separated_rooms' => $i
            ];
        }

        \Illuminate\Support\Facades\DB::table('separated_rooms')->insert($separatedRooms);
    }
}
