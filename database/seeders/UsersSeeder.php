<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Eduardo',
            'email' => 'eduardo@gmail.com',
            'password' => 'password'
        ]); 
        DB::table('users')->insert([
            'name' => 'Luis',
            'email' => 'luis@gmail.com',
            'password' => 'password'
        ]);
    }
}
