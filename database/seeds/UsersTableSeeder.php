<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Fadli',
            'email' => 'asd@gmail.com',
            'password' => bcrypt('testing123'),
            'api_token' => Str::random(80)
        ]);
        DB::table('users')->insert([
            'name' => 'Fadli2',
            'email' => 'asd2@gmail.com',
            'password' => bcrypt('testing1234'),
            'api_token' => Str::random(80)
        ]);
    }
}
