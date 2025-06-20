<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10'
        ]);

        // Проверка: заказывал ли пользователь этот товар
        $user = auth()->user();
        $hasOrdered = \App\Models\OrderItem::whereHas('order', function($q) use ($user) {
            $q->where('user_id', $user->id);
        })->where('product_id', $validated['product_id'])->exists();

        if (!$hasOrdered) {
            return response()->json([
                'success' => false,
                'message' => 'Вы можете оставить отзыв только на купленный товар.'
            ], 403);
        }

        $review = new \App\Models\Review([
            'user_id' => $user->id,
            'product_id' => $validated['product_id'],
            'rating' => $validated['rating'],
            'content' => $validated['content'],
            'is_approved' => false // Отзыв требует модерации
        ]);

        $review->save();
        $review->load('user');

        return response()->json([
            'success' => true,
            'review' => [
                'user' => [
                    'name' => $review->user->name
                ],
                'rating' => $review->rating,
                'content' => $review->content,
                'created_at' => $review->created_at->format('d.m.Y')
            ],
            'average_rating' => $review->product->reviews()->avg('rating')
        ]);
    }

    public function edit($id)
    {
        $review = Review::with('product')->findOrFail($id);
        if ($review->user_id !== auth()->id() || $review->is_approved) {
            abort(403);
        }
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        if ($review->user_id !== auth()->id() || $review->is_approved) {
            abort(403);
        }
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:10'
        ]);
        $review->rating = $validated['rating'];
        $review->content = $validated['content'];
        $review->save();
        return redirect()->route('user')->with('success', 'Отзыв обновлён!');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        if ($review->user_id !== auth()->id() || $review->is_approved) {
            abort(403);
        }
        $review->delete();
        return redirect()->route('profile.reviews')->with('success', 'Отзыв удалён!');
    }
} 