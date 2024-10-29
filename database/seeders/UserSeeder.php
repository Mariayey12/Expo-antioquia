<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     */
    public function run(): void
    {
        $users = [
            [
 
                'name' => ' Maria Helenn Moron ' ,
                'email' => ' mmbhhsa-33@gmail.com',
                'email_verified_at' => ' mmbhhsa-33@gmail.com',
                'password' => 'password123',
                'phone' =>  8969666666, 
                'address' =>  '254 33' ,
                'remember_token' => 'password123',
                'category' => 'users',

            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
