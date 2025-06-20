@extends('layouts.app')
@section('content')
<div class="review-edit-container">
    <h2 class="review-edit-title">Редактировать отзыв на товар:<br> <span>{{ $review->product->title ?? 'Товар удалён' }}</span></h2>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST" class="review-edit-form">
        @csrf
        <div class="form-group">
            <label class="form-label">Ваша оценка</label>
            <div class="rating-input">
                @for($i = 5; $i >= 1; $i--)
                    <input type="radio" name="rating" value="{{ $i }}" id="star{{ $i }}" {{ $review->rating == $i ? 'checked' : '' }}>
                    <label for="star{{ $i }}">★</label>
                @endfor
            </div>
            @error('rating')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label">Ваш отзыв</label>
            <textarea name="content" class="form-control" required>{{ old('content', $review->content) }}</textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="review-edit-actions">
            <button type="submit" class="btn btn-main">Сохранить</button>
            <a href="{{ route('user') }}" class="btn btn-secondary">Отмена</a>
        </div>
    </form>
</div>
<style>
.review-edit-container {
    max-width: 480px;
    margin: 60px auto 0 auto;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    padding: 40px 32px 32px 32px;
    text-align: center;
}
.review-edit-title {
    font-size: 2.1rem;
    font-weight: 700;
    margin-bottom: 32px;
    color: #222;
    line-height: 1.2;
}
.review-edit-title span {
    font-size: 1.2rem;
    font-weight: 400;
    color: #555;
}
.review-edit-form .form-group {
    margin-bottom: 28px;
    text-align: left;
}
.form-label {
    font-size: 1.1rem;
    font-weight: 500;
    color: #222;
    margin-bottom: 8px;
    display: block;
}
.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-start;
    gap: 6px;
    margin-top: 4px;
}
.rating-input input[type="radio"] {
    display: none;
}
.rating-input label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
}
.rating-input input[type="radio"]:checked ~ label,
.rating-input label:hover,
.rating-input label:hover ~ label {
    color: #f1c40f;
}
.form-control {
    width: 100%;
    min-height: 90px;
    padding: 12px;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    font-size: 1rem;
    resize: vertical;
    background: #fafbfc;
    margin-top: 6px;
}
.review-edit-actions {
    display: flex;
    gap: 16px;
    justify-content: center;
    margin-top: 18px;
}
.btn-main {
    background: #d20d0d;
    color: #fff;
    border: none;
    padding: 12px 32px;
    border-radius: 6px;
    font-size: 1.1rem;
    font-weight: 600;
    transition: background 0.2s;
}
.btn-main:hover {
    background: #b00b0b;
}
.btn-secondary {
    background: #6c757d;
    color: #fff;
    border: none;
    padding: 12px 32px;
    border-radius: 6px;
    font-size: 1.1rem;
    font-weight: 600;
    transition: background 0.2s;
}
.btn-secondary:hover {
    background: #495057;
}
.text-danger {
    color: #d20d0d;
    font-size: 0.98rem;
    margin-top: 6px;
}
@media (max-width: 600px) {
    .review-edit-container {
        padding: 18px 6px;
    }
    .review-edit-title {
        font-size: 1.2rem;
    }
}
@media (max-width: 1200px) {
    .review-edit-container {
        margin-top: 60px !important;
    }
}
</style>
@endsection 