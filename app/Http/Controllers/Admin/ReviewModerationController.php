<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewModerationController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'product'])->orderBy('created_at', 'desc')->get();
        return view('admin.reviews', compact('reviews'));
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = 1;
        $review->save();
        return redirect()->route('admin.reviews')->with('success', 'Отзыв подтверждён!');
    }

    public function reject($id)
    {
        $review = Review::findOrFail($id);
        $review->is_approved = 2;
        $review->save();
        return redirect()->route('admin.reviews')->with('success', 'Отзыв отклонен.');
    }
} 