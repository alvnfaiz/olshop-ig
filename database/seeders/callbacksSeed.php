<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class callbacksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'settings_id' => 1,
            'settings_name' => 'access_token',
            'settings_value' => null,
        ]);
        DB::table('settings')->insert([
            'settings_id' => 2,
            'settings_name' => 'token_type',
            'settings_value' => null,
        ]);
        DB::table('settings')->insert([
            'settings_id' => 3,
            'settings_name' => 'expires_in',
            'settings_value' => null,
        ]);
        DB::table('settings')->insert([
            'settings_id' => 4,
            'settings_name' => 'instagram_id',
            'settings_value' => null,
        ]);
    }
}
