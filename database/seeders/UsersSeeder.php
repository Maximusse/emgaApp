<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'code_user' => 1,
                'name' => "KOFFI SERGE AMOND ARMEL",
                'email' => "001190410",
                'password' => Hash::make('emga'),
                'roles_id' => 1,
                'type_users_id' => 1,
            ],
            [
                'code_user' => 2,
                'name' => "LOBA JEAN LOUIS GUILLAUME",
                'email' => "001190420",
                'password' => Hash::make('emga'),
                'roles_id' => 2,
                'type_users_id' => 2, 
            ],
            [
                'code_user' => 3,
                'name' => "KONE MARIAMA",
                'email' => "001190430",
                'password' => Hash::make('emga'),
                'roles_id' => 2,
                'type_users_id' => 3, 
            ],
            [
                'code_user' => 4,
                'name' => "COULIBALY ALASSAN",
                'email' => "001190440",
                'password' => Hash::make('emga'),
                'roles_id' => 2,
                'type_users_id' => 4, 
            ],
            [
                'code_user' => 5,
                'name' => "SANTOS SARA",
                'email' => "001190450",
                'password' => Hash::make('emga'),
                'roles_id' => 2,
                'type_users_id' => 1, 
            ],
            [
                'code_user' => 6,
                'name' => "DOH SERGE",
                'email' => "001190470",
                'password' => Hash::make('emga'),
                'roles_id' => 3,
                'type_users_id' => 1, 
            ],
            [
                'code_user' => 7,
                'name' => "KOFFI JESSICA",
                'email' => "001190480",
                'password' => Hash::make('emga'),
                'roles_id' => 3,
                'type_users_id' => 2, 
            ],
            [
                'code_user' => 8,
                'name' => "SOUMAHORO MORY",
                'email' => "001190490",
                'password' => Hash::make('emga'),
                'roles_id' => 3,
                'type_users_id' => 3, 
            ],
            [
                'code_user' => 9,
                'name' => "OULAI GUY",
                'email' => "001190500",
                'password' => Hash::make('emga'),
                'roles_id' => 3,
                'type_users_id' => 4, 
            ],
        ]);
    }
}
