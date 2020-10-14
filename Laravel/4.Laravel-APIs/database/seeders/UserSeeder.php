<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $me = new User();
        $me->name = 'Mohamed Yehia';
        $me->email = 'mohamedyehia1998@gmail.com';
        $me->password = Hash::make('12345678');
        $me->save();
    }
}
