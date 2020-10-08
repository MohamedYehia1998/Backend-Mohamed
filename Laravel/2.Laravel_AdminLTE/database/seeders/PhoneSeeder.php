<?php

namespace Database\Seeders;

use App\Models\Student;
use Database\Factories\PhoneFactory;
use Database\Factories\StudentFactory;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneFactory::times(2000)->create();
    }
}
