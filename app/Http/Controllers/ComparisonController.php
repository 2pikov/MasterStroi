<?php

namespace App\Http\Controllers;

use App\Models\Comparison;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ComparisonController extends Controller
{
    // Страница сравнения
    public function index()
    {
        $comparisons = \App\Models\Comparison::where('user_id', auth()->id())->with('product')->get();
        // Фильтрация: оставляем только одну категорию, остальные удаляем
        $categoryId = null;
        $filtered = collect();
        $toDelete = collect();
        foreach ($comparisons as $comparison) {
            if (!$categoryId && $comparison->product) {
                $categoryId = $comparison->product->category_id;
            }
            if ($comparison->product && $comparison->product->category_id === $categoryId) {
                $filtered->push($comparison);
            } else {
                $toDelete->push($comparison->id);
            }
        }
        if ($toDelete->count() > 0) {
            \App\Models\Comparison::whereIn('id', $toDelete)->delete();
        }
        $mixedCategories = $comparisons->count() > $filtered->count();
        return view('comparisons.index', [
            'comparisons' => $filtered,
            'mixedCategories' => $mixedCategories
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
            $current = Comparison::where('user_id', $userId)->with('product')->get();
            if ($current->count() > 0) {
                $first = $current->first(function($c) { return $c->product; });
                if ($first && $first->product->category_id !== $product->category_id) {
                    Log::warning('Category mismatch', ['user_id' => $userId, 'product_id' => $productId]);
                    return response()->json(['status' => 'error', 'message' => 'Можно сравнивать только товары одной категории']);
                }
            }
            if ($current->count() >= 4) {
                Log::warning('Comparison limit reached', ['user_id' => $userId]);
                return response()->json(['status' => 'error', 'message' => 'Можно сравнивать максимум 4 товара']);
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
} 