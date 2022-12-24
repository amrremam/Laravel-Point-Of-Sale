<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = \App\Models\User::create([
            'first_name'=>'super',
            'last_name'=>'admin',
            'email'=>'super_admin@er.com',
            'password'=>bcrypt('123456'),
        ]);
        $user->attachRole('super_admin');
    }
}
