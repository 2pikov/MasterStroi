<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ComparisonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Страница сравнения
    public function index()
    {
        $comparisons = Comparison::where('user_id', auth()->id())
            ->with('product')
            ->get();

        return view('comparisons.index', [
            'comparisons' => $comparisons,
        ]);
    }

    // Добавить/удалить товар из сравнения
    public function toggle(Request $request)
    {
        Log::info('TOGGLE', [
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'request' => $request->all()
        ]);
        try {
            $userId = auth()->id();
            $productId = $request->product_id;
            $product = Product::find($productId);

            if (!$product) {
                Log::warning('Product not found', ['product_id' => $productId]);
                return response()->json(['status' => 'error', 'message' => 'Товар не найден'], 404);
            }

            $existing = Comparison::where('user_id', $userId)->where('product_id', $productId)->first();

            if ($existing) {
                $existing->delete();
                Log::info('Comparison removed', ['user_id' => $userId, 'product_id' => $productId]);
                return response()->json(['status' => 'removed']);
            }
            
            // Снимем ограничение на сравнение товаров из разных категорий
            $currentCount = Comparison::where('user_id', $userId)->count();
            if ($currentCount >= 8) { // Оставим разумный лимит
                Log::warning('Comparison limit reached', ['user_id' => $userId]);
                return response()->json(['status' => 'error', 'message' => 'Можно сравнивать максимум 8 товаров']);
            }
            
            Comparison::create([
                'user_id' => $userId,
                'product_id' => $productId
            ]);
            Log::info('Comparison created', ['user_id' => $userId, 'product_id' => $productId]);
            return response()->json(['status' => 'added']);
        } catch (\Exception $e) {
            Log::error('Comparison error', ['error' => $e->getMessage()]);
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function clearAll()
    {
        Comparison::where('user_id', auth()->id())->delete();
        return response()->json(['status' => 'cleared']);
    }
} 