<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = [
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
            ]
        ];

        $roles = [
            [
                'id' => 1,
                'name' => 'Admin',
            ],
            [
                'id' => 2,
                'name' => 'Keuangan',
            ],
            [
                'id' => 3,
                'name' => 'Reviewer',
            ],
            [
                'id' => 4,
                'name' => 'Author',
            ]
        ];

        foreach ($roles as $key => $role) {
            Role::create($role);
        }

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
