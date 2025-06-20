<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'user_id' => '2',
                'product_id' => '1',
                'rating' => '5',
                'content' => ' Шпатлевка понравилась, разводится и ложится хорошо, высыхает как по инструкции, не слишком быстро. При высыхании становится белой.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-19 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-19 10:00:00'),
            ],
            [
                'user_id' => '5',
                'product_id' => '1',
                'rating' => '3',
                'content' => 'Сыпится, непонравилась консистенция, цвет не белый получился, а сероватый',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-03-13 11:00:00'),
                'updated_at' => Carbon::parse('2024-03-13 11:00:00'),
            ],
            [
                'user_id' => '4',
                'product_id' => '1',
                'rating' => '4',
                'content' => 'Отличная шпаклевка. Нигде не треснула, даже там где толстый слой. Грунтовкой не размывается, белого цвета. Хорошо шкурится.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-03-13 12:00:00'),
                'updated_at' => Carbon::parse('2024-03-13 12:00:00'),
            ],
            [
                'user_id' => '6',
                'product_id' => '2',
                'rating' => '5',
                'content' => 'Достойный товар, эластичность, мягкая, легка в нанесении',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-03-13 13:00:00'),
                'updated_at' => Carbon::parse('2024-03-13 13:00:00'),
            ],
        ]);
    }
}
