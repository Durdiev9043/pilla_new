<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [   'name'=>'tuman',
                'email'=>'tuman@gmail.com',
                'password'=>Hash::make('tuman'),
                'role'=>'1'
            ],
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('admin'),
                'role'=>'0'
            ],]
        );
    }
}
