<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(){
        $roles = [
            [
                'id'    => 1,
                'titre' => 'admin',
                'titre_arabe'          => 'أدمين',
            ],
            [
                'id'    => 2,
                'titre' => 'candidat',
                'titre_arabe'          => 'مترشح',
            ],
            [
                'id'    => 3,
                'titre' => 'etudiant',
                'titre_arabe'          => 'طالب',
            ],
        ];

        Role::insert($roles);
    }
}