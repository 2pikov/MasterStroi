@extends('layouts.app')
@section('content')
<style>
@media (max-width: 1200px) {
    .profile-reviews-container {
        margin-top: 60px !important;
    }
}
</style>
<div class="container profile-reviews-container" style="max-width:900px; margin:40px auto;">
    <h2 class="section-title">Мои отзывы</h2>
    <div class="user-reviews-list">
        <style>
            .user-review-item-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 8px;
            }
            .user-review-stars {
                display: flex;
                align-items: center;
                font-size: 18px;
                color: #f1c40f;
                gap: 2px;
                margin: 0;
                padding: 0;
            }
        </style>
        @forelse($reviews as $review)
            <div class="user-review-item" style="background:#f8f8f8; border-radius:12px; padding:20px; margin-bottom:20px;">
                <div class="user-review-item-header">
                    <div>
                        <strong>{{ $review->product->title ?? 'Товар удалён' }}</strong>
                        <span style="margin-left:10px; color:#888;">{{ $review->created_at->format('d.m.Y') }}</span>
                    </div>
                    <div class="user-review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star">{{ $i <= $review->rating ? '★' : '☆' }}</span>
                        @endfor
                    </div>
                </div>
                <div style="margin-top:10px;">{{ $review->content }}</div>
                <div style="margin-top:10px;">
                    <span class="badge {{ $review->is_approved ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ $review->is_approved ? 'Одобрен' : 'Ожидает модерации' }}
                    </span>
                    @if(!$review->is_approved)
                        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-outline-primary" style="margin-left:15px;">Редактировать</a>
                        <button type="button" class="btn btn-sm btn-outline-danger btn-delete-review" data-review-id="{{ $review->id }}" style="margin-left:10px;">Удалить</button>
                    @endif
                </div>
            </div>
        @empty
            <div>У вас пока нет отзывов</div>
        @endforelse
    </div>
</div>

<!-- Модальное окно подтверждения удаления отзыва -->
<div class="modal fade" id="deleteReviewModal" tabindex="-1" aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteReviewModalLabel">Подтверждение удаления</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Вы уверены, что хотите удалить этот отзыв?
      </div>
      <div class="modal-footer">
        <form id="deleteReviewForm" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        </form>
      </div>
    </div>
  </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete-review');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteReviewModal'));
    const deleteForm = document.getElementById('deleteReviewForm');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const reviewId = this.getAttribute('data-review-id');
            deleteForm.action = '/reviews/' + reviewId + '/delete';
            deleteModal.show();
        });
    });
});
</script>
@endpush
@endsection 