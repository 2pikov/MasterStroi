<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        DB::table('users')->insert(
            [
        [
            'id'=>'2',
            'name' => 'Никита',
            'surname' => 'Тупиков',
            'login' => 'nizrebe',
            'email' => 'nizrebe@gmail.com',
            'password' => Hash::make("user12345678"),
        ],
        [
            'id'=>'3',
            'name' => 'Надежда',
            'surname' => 'Одинова',
            'login' => 'loveerennn',
            'email' => 'loveerennn@gmail.com',
            'password' => Hash::make("user12345678"),
        ],
        [
            'id'=>'4',
            'name' => 'Рома',
            'surname' => 'Черенев',
            'login' => 'Kuung_Fuu',
            'email' => 'Kuung_Fuu@gmail.com',
            'password' => Hash::make("user12345678"),
        ],
        [
            'id'=>'5',
            'name' => 'Аника',
            'surname' => 'Алексанян',
            'login' => 'shrekiskis',
            'email' => 'shrekiskis@gmail.com',
            'password' => Hash::make("user12345678"),
        ],
        [
            'id'=>'6',
            'name' => 'Диана',
            'surname' => 'Бакемоногатари',
            'login' => 'sasavha',
            'email' => 'sasavha@gmail.com',
            'password' => Hash::make("user12345678"),
        ],
        ]
    );
    }
}
