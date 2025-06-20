<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        // Получаем 3 товара с самым высоким средним рейтингом
        $hits = \App\Models\Product::with('reviews')
            ->get()
            ->sortByDesc(function($product) {
                return $product->reviews->where('is_approved', true)->avg('rating') ?? 0;
            })
            ->take(3);

        return view('welcome', compact('hits'));
    }
}
