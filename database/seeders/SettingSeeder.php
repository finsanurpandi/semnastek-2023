<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'id' => 1,
                'due_date' => now(),
                'payment' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
