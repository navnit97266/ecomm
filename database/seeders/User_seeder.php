<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Vinay Kumar',
            'email'=>'vinay@gmail.com',
            'password'=> \Illuminate\Support\Facades\Hash::make('12345')
        ]);
    }
}
