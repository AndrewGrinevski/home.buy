<?php

use Illuminate\Database\Seeder;

class BathroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bathrooms = [
            ['type_of_bathrooms' => 'Раздельный'],
            ['type_of_bathrooms' => 'Совмещенный'],
            ['type_of_bathrooms' => 'Два сан. узла']
        ];

        \Illuminate\Support\Facades\DB::table('bathrooms')->insert($bathrooms);
    }
}
