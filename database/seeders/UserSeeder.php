<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'Admin',
                'email' => 'admin@unsur.ac.id',
                'password' => bcrypt('12345'),
                'role_id' => 1
            ],
            [
                'name' => 'Keuangan',
                'email' => 'keuangan@unsur.ac.id',
                'password' => bcrypt('12345'),
                'role_id' => 2
            ],
            [
                'name' => 'Reviewer',
                'email' => 'reviewer@unsur.ac.id',
                'password' => bcrypt('12345'),
                'role_id' => 3
            ],
            [
                'name' => 'Participant',
                'email' => 'participant@unsur.ac.id',
                'password' => bcrypt('12345'),
                'role_id' => 4
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@unsur.ac.id',
                'password' => bcrypt('12345'),
                'role_id' => 5
            ],
        ]);
    }
}
