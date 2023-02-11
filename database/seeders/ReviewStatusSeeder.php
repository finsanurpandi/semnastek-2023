<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('review_statuses')->insert([
            [
                'id' => 1,
                'name' => 'Accept Submission',
            ],
            [
                'id' => 2,
                'name' => 'Revision Required',
            ],
            [
                'id' => 3,
                'name' => 'Resubmit for Review',
            ],
            [
                'id' => 4,
                'name' => 'Decline Submission',
            ],
        ]);
    }
}
