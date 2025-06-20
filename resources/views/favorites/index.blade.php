@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ Vite::asset('resources/css/favorites.css') }}">
@endsection

@section('content')
<div class="favorites">
    <h1>Избранные товары</h1>
    
    <div class="sort-controls">
        <a href="#">Дате добавления</a>
        <a href="#">Цене</a>
        <a href="#">Отзывам</a>
    </div>
    
    @if($favorites->count() > 0)
        <div class="favorites-grid">
            @foreach($favorites as $favorite)
                <div class="product-card">
                    <div class="product-code">код: {{ $favorite->product->id }}</div>
                    <div class="product-actions">
                        <button class="remove-from-favorites" data-product-id="{{ $favorite->product->id }}" title="Удалить из избранного">
                            <i class="fas fa-heart"></i>
                        </button>
                        <button class="compare" title="Добавить к сравнению">
                            <i class="fas fa-chart-bar"></i>
                        </button>
                    </div>
                    <img src="{{ Vite::asset('resources/media/images/' . $favorite->product->img) }}" 
                         alt="{{ $favorite->product->title }}">
                    <div class="rating">
                        @php
                            $approvedReviews = $favorite->product->reviews->where('is_approved', true);
                            $rating = $approvedReviews->avg('rating') ?? 0;
                        @endphp
                        @for($i = 1; $i <= 5; $i++)
                            <span class="star">{{ $i <= round($rating) ? '★' : '☆' }}</span>
                        @endfor
                        <span class="count">{{ $approvedReviews->count() }}</span>
                    </div>
                    <h3>{{ $favorite->product->title }}</h3>
                    <p class="price">{{ number_format($favorite->product->price, 0, ',', ' ') }} ₽</p>
                    <p class="stock-info">В наличии 1 шт.</p>
                    <p class="delivery-info">
                        Самовывоз: <a href="#">завтра</a><br>
                        Курьером: <a href="#">уточняйте у менеджера</a>
                    </p>
                    <button class="remove-favorite" data-product-id="{{ $favorite->product->id }}">
                        В корзину
                    </button>
                </div>
            @endforeach
        </div>
    @else
        <p>У вас пока нет избранных товаров</p>
    @endif
</div>

<script>
document.querySelectorAll('.remove-from-favorites').forEach(button => {
    button.addEventListener('click', function() {
        const productId = this.dataset.productId;
        fetch('/favorites/toggle', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.closest('.product-card').remove();
                if (document.querySelectorAll('.product-card').length === 0) {
                    location.reload();
                }
            }
        });
    });
});
</script>
@endsection 