<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'cne'            => 'D11111',
            ],
            [
                'id'             => 2,
                'name'           => 'etudiant',
                'email'          => 'etudiant@etudiant.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
                'cne'            => 'D92222',
            ],
        ];

        User::insert($users);
    }
}