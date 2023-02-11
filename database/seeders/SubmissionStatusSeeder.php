<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmissionStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submission_statuses')->insert([
            [
                'id' => 1,
                'name' => 'Awaiting Assignment',
            ],
            [
                'id' => 2,
                'name' => 'In Review',
            ],
            [
                'id' => 3,
                'name' => 'Submission in Editing',
            ],
            [
                'id' => 4,
                'name' => 'Published',
            ],
        ]);
    }
}
