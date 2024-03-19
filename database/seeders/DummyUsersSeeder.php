<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userData = [
            [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' =>  bcrypt(123456)
            ],
            [
            'name' => 'guest',
            'email' => 'guest@gmail.com',
            'role' => 'guest',
            'password' =>  bcrypt(123456)
            ],
        ];

        foreach($userData as $key => $value){
            User::create($value);
        }
    }
}
