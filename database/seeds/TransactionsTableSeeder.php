<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            ['type_of_transaction' => 'Любые'],
            ['type_of_transaction' => 'Чистая продажа'],
            ['type_of_transaction' => 'Обмен']
        ];

        \Illuminate\Support\Facades\DB::table('transactions')->insert($transactions);
    }
}
