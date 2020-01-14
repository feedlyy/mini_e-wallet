<?php

use Illuminate\Database\Seeder;

class UserBalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_balance')->insert([
            'user_id' => 1,
            'balance' => 10000,
            'balance_achieve' => 'testing'
        ]);
        DB::table('user_balance')->insert([
            'user_id' => 2,
            'balance' => 15000,
            'balance_achieve' => 'testing'
        ]);
    }
}
