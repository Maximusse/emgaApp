<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_users')->insert([
            [
                'code_type_users' => rand(1000, 9999),
                'libelle_type_users' => 'DORH'
            ],
            [
                'code_type_users' => rand(1000, 9999),
                'libelle_type_users' => 'COMPAGNIE'
            ],
            [
                'code_type_users' => rand(1000, 9999),
                'libelle_type_users' => 'DIVISION'
            ],
            [
                'code_type_users' => rand(1000, 9999),
                'libelle_type_users' => 'MESSE'
            ],
            
        ]);
    }
}
