@extends('layouts.app')
@section('content')
<div class="container" style="max-width:900px; margin:40px auto;">
    <h1 style="margin-bottom:32px;">Модерация отзывов</h1>
    <div class="admin-reviews-list">
        @forelse($reviews as $review)
            <div class="admin-review-card">
                <div class="admin-review-header">
                    <div>
                        <span class="admin-review-user">{{ $review->user->name }}</span>
                        <span class="admin-review-date">{{ $review->created_at->format('d.m.Y') }}</span>
                    </div>
                    <span class="admin-review-status {{ $review->is_approved ? 'approved' : 'pending' }}">
                        {{ $review->is_approved ? 'Подтверждён' : 'Ожидает модерации' }}
                    </span>
                </div>
                <div class="admin-review-product">Товар: <b>{{ $review->product->title ?? 'Товар удалён' }}</b></div>
                <div class="admin-review-rating">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="star" style="color:#f1c40f; font-size:18px;">{{ $i <= $review->rating ? '★' : '☆' }}</span>
                    @endfor
                </div>
                <div class="admin-review-content">{{ $review->content }}</div>
                @if(!$review->is_approved)
                <form action="{{ route('admin.reviews.approve', $review->id) }}" method="POST" class="admin-review-action">
                    @csrf
                    <button type="submit" class="btn btn-success">Подтвердить</button>
                </form>
                @endif
            </div>
        @empty
            <div class="alert alert-info">Нет отзывов для модерации</div>
        @endforelse
    </div>
</div>
<style>
.admin-reviews-list {
    display: flex;
    flex-direction: column;
    gap: 28px;
}
.admin-review-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.07);
    padding: 28px 32px 20px 32px;
    position: relative;
    transition: box-shadow 0.2s;
}
.admin-review-card:hover {
    box-shadow: 0 8px 32px rgba(0,0,0,0.13);
}
.admin-review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
.admin-review-user {
    font-weight: 600;
    color: #222;
    font-size: 1.1rem;
}
.admin-review-date {
    color: #888;
    font-size: 0.98rem;
    margin-left: 16px;
}
.admin-review-status {
    font-size: 0.98rem;
    padding: 4px 14px;
    border-radius: 8px;
    font-weight: 500;
}
.admin-review-status.approved {
    background: #e8f5e9;
    color: #198754;
}
.admin-review-status.pending {
    background: #fff3cd;
    color: #856404;
}
.admin-review-product {
    font-size: 1.05rem;
    color: #555;
    margin-bottom: 8px;
}
.admin-review-rating {
    margin-bottom: 10px;
}
.admin-review-content {
    font-size: 1.08rem;
    color: #222;
    margin-bottom: 16px;
    background: #f8f9fa;
    border-radius: 8px;
    padding: 12px 16px;
}
.admin-review-action {
    text-align: right;
}
.btn-success {
    background: #198754;
    border: none;
    padding: 8px 24px;
    border-radius: 6px;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    transition: background 0.2s;
}
.btn-success:hover {
    background: #146c43;
}
@media (max-width: 700px) {
    .admin-review-card {
        padding: 16px 8px 12px 8px;
    }
}
</style>
@endsection 