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
            [
                'user_id' => '1',
                'product_id' => '3',
                'rating' => '4',
                'content' => 'Неплохой продукт, соответствует описанию.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-20 09:00:00'),
                'updated_at' => Carbon::parse('2024-05-20 09:00:00'),
            ],
            [
                'user_id' => '3',
                'product_id' => '3',
                'rating' => '5',
                'content' => 'Отличный выбор, рекомендую всем.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-21 11:00:00'),
                'updated_at' => Carbon::parse('2024-05-21 11:00:00'),
            ],
        
            // Product 4
            [
                'user_id' => '2',
                'product_id' => '4',
                'rating' => '3',
                'content' => 'Есть небольшие недостатки, но в целом нормально.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-22 14:00:00'),
                'updated_at' => Carbon::parse('2024-05-22 14:00:00'),
            ],
            [
                'user_id' => '4',
                'product_id' => '4',
                'rating' => '4',
                'content' => 'Хороший продукт за свои деньги.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
             [
                'user_id' => '5',
                'product_id' => '4',
                'rating' => '5',
                'content' => 'Товар полностью соответствует ожиданиям.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 5
             [
                'user_id' => '6',
                'product_id' => '5',
                'rating' => '3',
                'content' => 'Посредственный товар, ожидал большего.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
            [
                'user_id' => '4',
                'product_id' => '5',
                'rating' => '4',
                'content' => 'В целом неплохо, но есть аналоги получше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 6
            [
                'user_id' => '3',
                'product_id' => '6',
                'rating' => '5',
                'content' => 'Отличный товар, полностью доволен покупкой.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
           [
                'user_id' => '4',
                'product_id' => '6',
                'rating' => '4',
                'content' => 'Хорошее качество, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 7
            [
                'user_id' => '2',
                'product_id' => '7',
                'rating' => '3',
                'content' => 'Не впечатлил, ожидал большего.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 8
            [
                'user_id' => '5',
                'product_id' => '8',
                'rating' => '5',
                'content' => 'Очень рад покупке, все отлично.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
             [
                'user_id' => '6',
                'product_id' => '8',
                'rating' => '2',
                'content' => 'Качество оставляет желать лучшего.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 9
            [
                'user_id' => '6',
                'product_id' => '9',
                'rating' => '4',
                'content' => 'Соответствует заявленным характеристикам.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
            [
                'user_id' => '3',
                'product_id' => '9',
                'rating' => '3',
                'content' => 'На троечку, можно найти лучше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 10
            [
                'user_id' => '2',
                'product_id' => '10',
                'rating' => '5',
                'content' => 'Отличное качество, быстрая доставка.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
             [
                'user_id' => '4',
                'product_id' => '10',
                'rating' => '4',
                'content' => 'Вполне хороший товар.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-23 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-23 10:00:00'),
            ],
        
            // Product 11
            [
                'user_id' => '5',
                'product_id' => '11',
                'rating' => '3',
                'content' => 'Ожидал большего от этого продукта.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
            [
                'user_id' => '6',
                'product_id' => '11',
                'rating' => '5',
                'content' => 'Прекрасный товар, всем советую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
        
            // Product 12
            [
                'user_id' => '4',
                'product_id' => '12',
                'rating' => '4',
                'content' => 'Неплохой товар, но можно найти дешевле.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
             [
                'user_id' => '2',
                'product_id' => '12',
                'rating' => '3',
                'content' => 'Не соответствует заявленным характеристикам.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
        
            // Product 13
            [
                'user_id' => '3',
                'product_id' => '13',
                'rating' => '5',
                'content' => 'Всё супер, буду заказывать ещё.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
        
            // Product 14
            [
                'user_id' => '4',
                'product_id' => '14',
                'rating' => '4',
                'content' => 'Хорошо, но есть куда стремиться.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
            [
                'user_id' => '5',
                'product_id' => '14',
                'rating' => '3',
                'content' => 'Посредственный товар, второй раз не куплю.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-24 12:00:00'),
                'updated_at' => Carbon::parse('2024-05-24 12:00:00'),
            ],
        
            // Product 15
            [
                'user_id' => '6',
                'product_id' => '15',
                'rating' => '5',
                'content' => 'Отличный товар, всем рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-25 15:00:00'),
                'updated_at' => Carbon::parse('2024-05-25 15:00:00'),
            ],
        
            // Product 16
            [
                'user_id' => '6',
                'product_id' => '16',
                'rating' => '4',
                'content' => 'Всё хорошо, но доставка долгая.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-26 08:00:00'),
                'updated_at' => Carbon::parse('2024-05-26 08:00:00'),
            ],
            [
                'user_id' => '3',
                'product_id' => '16',
                'rating' => '2',
                'content' => 'Товар не соответствует описанию.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-26 08:00:00'),
                'updated_at' => Carbon::parse('2024-05-26 08:00:00'),
            ],
        
            // Product 17
            [
                'user_id' => '2',
                'product_id' => '17',
                'rating' => '5',
                'content' => 'Всё отлично, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-27 11:00:00'),
                'updated_at' => Carbon::parse('2024-05-27 11:00:00'),
            ],
            [
                'user_id' => '4',
                'product_id' => '17',
                'rating' => '4',
                'content' => 'Неплохой продукт, но есть аналоги лучше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-27 11:00:00'),
                'updated_at' => Carbon::parse('2024-05-27 11:00:00'),
            ],
        
            // Product 18
            [
                'user_id' => '5',
                'product_id' => '18',
                'rating' => '3',
                'content' => 'Товар средний, ожидал большего.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-28 16:00:00'),
                'updated_at' => Carbon::parse('2024-05-28 16:00:00'),
            ],
        
            // Product 19
            [
                'user_id' => '6',
                'product_id' => '19',
                'rating' => '5',
                'content' => 'Отличный продукт, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-29 09:00:00'),
                'updated_at' => Carbon::parse('2024-05-29 09:00:00'),
            ],
           [
                'user_id' => '2',
                'product_id' => '19',
                'rating' => '4',
                'content' => 'Хорошо, но дорого.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-29 09:00:00'),
                'updated_at' => Carbon::parse('2024-05-29 09:00:00'),
            ],
        
            // Product 20
            [
                'user_id' => '2',
                'product_id' => '20',
                'rating' => '3',
                'content' => 'Неплохо, но есть куда стремиться.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-30 13:00:00'),
                'updated_at' => Carbon::parse('2024-05-30 13:00:00'),
            ],
        
            // Product 21
            [
                'user_id' => '3',
                'product_id' => '21',
                'rating' => '5',
                'content' => 'Отличный продукт, буду заказывать ещё.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-31 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-31 10:00:00'),
            ],
           [
                'user_id' => '4',
                'product_id' => '21',
                'rating' => '4',
                'content' => 'Вполне доволен покупкой.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-05-31 10:00:00'),
                'updated_at' => Carbon::parse('2024-05-31 10:00:00'),
            ],
        
            // Product 22
            [
                'user_id' => '5',
                'product_id' => '22',
                'rating' => '2',
                'content' => 'Ужасное качество, не рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-01 14:00:00'),
                'updated_at' => Carbon::parse('2024-06-01 14:00:00'),
            ],
             [
                'user_id' => '6',
                'product_id' => '22',
                'rating' => '3',
                'content' => 'Ничего особенного, можно найти лучше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-01 14:00:00'),
                'updated_at' => Carbon::parse('2024-06-01 14:00:00'),
            ],
        
            // Product 23
            [
                'user_id' => '3',
                'product_id' => '23',
                'rating' => '5',
                'content' => 'Супер, рекомендую всем.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-02 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-02 11:00:00'),
            ],
        
            // Product 24
            [
                'user_id' => '2',
                'product_id' => '24',
                'rating' => '4',
                'content' => 'Всё хорошо, но доставка долгая.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-03 12:00:00'),
                'updated_at' => Carbon::parse('2024-06-03 12:00:00'),
            ],
             [
                'user_id' => '3',
                'product_id' => '24',
                'rating' => '3',
                'content' => 'Неплохо, но цена завышена.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-03 12:00:00'),
                'updated_at' => Carbon::parse('2024-06-03 12:00:00'),
            ],
        
            // Product 25
            [
                'user_id' => '4',
                'product_id' => '25',
                'rating' => '5',
                'content' => 'Отличный продукт, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-04 15:00:00'),
                'updated_at' => Carbon::parse('2024-06-04 15:00:00'),
            ],
        
            // Product 26
            [
                'user_id' => '5',
                'product_id' => '26',
                'rating' => '4',
                'content' => 'Хорошее качество, но есть небольшие недостатки.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-05 10:00:00'),
                'updated_at' => Carbon::parse('2024-06-05 10:00:00'),
            ],
            [
                'user_id' => '6',
                'product_id' => '26',
                'rating' => '3',
                'content' => 'Неплохо, но не вау.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-05 10:00:00'),
                'updated_at' => Carbon::parse('2024-06-05 10:00:00'),
            ],
        
            // Product 27
            [
                'user_id' => '5',
                'product_id' => '27',
                'rating' => '5',
                'content' => 'Отличный товар, всем советую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-06 14:00:00'),
                'updated_at' => Carbon::parse('2024-06-06 14:00:00'),
            ],
        
            // Product 28
            [
                'user_id' => '2',
                'product_id' => '28',
                'rating' => '4',
                'content' => 'В целом неплохо, но есть аналоги получше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-07 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-07 11:00:00'),
            ],
             [
                'user_id' => '3',
                'product_id' => '28',
                'rating' => '2',
                'content' => 'Плохое качество, не стоит своих денег.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-07 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-07 11:00:00'),
            ],
        
            // Product 29
            [
                'user_id' => '4',
                'product_id' => '29',
                'rating' => '5',
                'content' => 'Отличный товар, буду заказывать ещё.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-08 12:00:00'),
                'updated_at' => Carbon::parse('2024-06-08 12:00:00'),
            ],
            [
                'user_id' => '5',
                'product_id' => '29',
                'rating' => '4',
                'content' => 'Всё супер, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-08 12:00:00'),
                'updated_at' => Carbon::parse('2024-06-08 12:00:00'),
            ],
        
            // Product 30
            [
                'user_id' => '6',
                'product_id' => '30',
                'rating' => '3',
                'content' => 'Неплохо, но ожидал большего.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-09 15:00:00'),
                'updated_at' => Carbon::parse('2024-06-09 15:00:00'),
            ],
        
            // Product 31
            [
                'user_id' => '3',
                'product_id' => '31',
                'rating' => '5',
                'content' => 'Отличный товар, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-10 10:00:00'),
                'updated_at' => Carbon::parse('2024-06-10 10:00:00'),
            ],
            [
                'user_id' => '2',
                'product_id' => '31',
                'rating' => '4',
                'content' => 'Хорошее качество, всё супер.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-10 10:00:00'),
                'updated_at' => Carbon::parse('2024-06-10 10:00:00'),
            ],
        
            // Product 32
            [
                'user_id' => '3',
                'product_id' => '32',
                'rating' => '3',
                'content' => 'Средний товар, ожидал большего.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-11 14:00:00'),
                'updated_at' => Carbon::parse('2024-06-11 14:00:00'),
            ],
        
            // Product 33
            [
                'user_id' => '4',
                'product_id' => '33',
                'rating' => '5',
                'content' => 'Супер, рекомендую всем.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-12 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-12 11:00:00'),
            ],
            [
                'user_id' => '5',
                'product_id' => '33',
                'rating' => '4',
                'content' => 'Хороший продукт за свои деньги.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-12 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-12 11:00:00'),
            ],
        
            // Product 34
            [
                'user_id' => '6',
                'product_id' => '34',
                'rating' => '2',
                'content' => 'Ужасное качество, не рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-13 12:00:00'),
                'updated_at' => Carbon::parse('2024-06-13 12:00:00'),
            ],
            [
                'user_id' => '2',
                'product_id' => '34',
                'rating' => '3',
                'content' => 'Средний товар, можно найти лучше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-13 12:00:00'),
                'updated_at' => Carbon::parse('2024-06-13 12:00:00'),
            ],
        
            // Product 35
            [
                'user_id' => '2',
                'product_id' => '35',
                'rating' => '5',
                'content' => 'Отличный продукт, всем советую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-14 15:00:00'),
                'updated_at' => Carbon::parse('2024-06-14 15:00:00'),
            ],
            [
                'user_id' => '3',
                'product_id' => '35',
                'rating' => '4',
                'content' => 'Соответствует описанию, рекомендую.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-14 15:00:00'),
                'updated_at' => Carbon::parse('2024-06-14 15:00:00'),
            ],
        
            // Product 36
            [
                'user_id' => '4',
                'product_id' => '36',
                'rating' => '3',
                'content' => 'Неплохо, но есть аналоги лучше.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-15 10:00:00'),
                'updated_at' => Carbon::parse('2024-06-15 10:00:00'),
            ],
        
            // Product 37
            [
                'user_id' => '5',
                'product_id' => '37',
                'rating' => '5',
                'content' => 'Всё отлично, быстрая доставка.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-16 14:00:00'),
                'updated_at' => Carbon::parse('2024-06-16 14:00:00'),
            ],
             [
                'user_id' => '6',
                'product_id' => '37',
                'rating' => '4',
                'content' => 'Хорошее соотношение цены и качества.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-16 14:00:00'),
                'updated_at' => Carbon::parse('2024-06-16 14:00:00'),
            ],
        
            // Product 38
            [
                'user_id' => '4',
                'product_id' => '38',
                'rating' => '3',
                'content' => 'Средний товар, ничего особенного.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-17 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-17 11:00:00'),
            ],
            [
                'user_id' => '2',
                'product_id' => '38',
                'rating' => '2',
                'content' => 'Качество не соответствует цене.',
                'is_approved' => '1',
                'created_at' => Carbon::parse('2024-06-17 11:00:00'),
                'updated_at' => Carbon::parse('2024-06-17 11:00:00'),
            ]
        ]);
    }
}
