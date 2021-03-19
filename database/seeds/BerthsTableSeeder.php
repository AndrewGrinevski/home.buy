<?php

use Illuminate\Database\Seeder;

class BerthsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $berths = [];
        for ($i=1; $i<=12; $i++) {
            $berths[] = [
                'number_of_berths' => $i
            ];
        }

        \Illuminate\Support\Facades\DB::table('berths')->insert($berths);
    }
}
