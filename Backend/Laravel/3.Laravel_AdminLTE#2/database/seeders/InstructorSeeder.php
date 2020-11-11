<?php

namespace Database\Seeders;

use Database\Factories\InstructorFactory;
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
        InstructorFactory::times(200)->create();
    }
}
