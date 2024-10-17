<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'code_roles' => rand(1000, 9999),
                'libelle_roles' => 'SUPER ADMIN'
            ],
            [
                'code_roles' => rand(1000, 9999),
                'libelle_roles' => 'ADMIN'
            ],
            [
                'code_roles' => rand(1000, 9999),
                'libelle_roles' => 'USER'
            ],
        ]);
    }
}
