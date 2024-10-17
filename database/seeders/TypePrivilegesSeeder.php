<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypePrivilegesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_privileges')->insert([
            [
                'code_type_privileges' => rand(1000, 9999),
                'libelle_type_privileges' => 'LECTURE'
            ],
            [
                'code_type_privileges' => rand(1000, 9999),
                'libelle_type_privileges' => 'ECRITURE'
            ],
            [
                'code_type_privileges' => rand(1000, 9999),
                'libelle_type_privileges' => 'MODIFICATION'
            ],
            [
                'code_type_privileges' => rand(1000, 9999),
                'libelle_type_privileges' => 'SUPPRESSION'
            ],
        ]);
    }
}
