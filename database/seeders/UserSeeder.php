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
        
        //
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'is_admin' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
