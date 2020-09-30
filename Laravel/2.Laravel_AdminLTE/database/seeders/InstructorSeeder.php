<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Instructor::factory(24)->create();
    }
}
