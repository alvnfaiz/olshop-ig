<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class callbacksSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('callbacks')->insert([
            'id' => 1,
            'name' => 'access_token',
            'value' => null,
        ]);
        DB::table('callbacks')->insert([
            'id' => 2,
            'name' => 'token_type',
            'value' => null,
        ]);
        DB::table('callbacks')->insert([
            'id' => 3,
            'name' => 'expires_in',
            'value' => null,
        ]);
        DB::table('callbacks')->insert([
            'id' => 4,
            'name' => 'instagram_id',
            'value' => null,
        ]);
    }
}
