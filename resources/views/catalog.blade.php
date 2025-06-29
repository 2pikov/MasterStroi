@extends('layouts.app')

@section('content')
<div class="catalog-page">
    <!-- Добавляем модальное окно в начало страницы -->
    <div class="modal-notification" id="cartNotification">
        <i class="fas fa-check-circle"></i>
        <span class="modal-notification-text">Товар добавлен в корзину</span>
    </div>
    
    <div class="catalog-wrapper">
        <!-- Боковое меню с фильтрами -->
        <aside class="catalog-sidebar">
            <form action="{{ route('catalog') }}" method="GET" class="filters-form">
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Категория</h3>
                    <select name="category" class="filter-select">
                        <option value="">Все категории</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->product_type }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Страна производитель</h3>
                    <select name="country" class="filter-select">
                        <option value="">Все страны</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}" {{ request()->get('country') == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="sidebar-block">
                    <h3 class="sidebar-title">Ценовой диапазон</h3>
                    <div class="price-range">
                        <input type="number" name="price_from" class="filter-input" placeholder="От" 
                            value="{{ request()->get('price_from') }}">
                        <span>—</span>
                        <input type="number" name="price_to" class="filter-input" placeholder="До" 
                            value="{{ request()->get('price_to') }}">
                    </div>
                </div>

                {{-- Дополнительная фильтрация --}}
                @if(request()->get('category'))
                <div class="sidebar-block">
                    <h3 class="sidebar-title">Дополнительная фильтрация</h3>
                    <div class="filter-group">
                        <h4 class="filter-group-title">Основа</h4>
                        <select name="base" class="filter-select">
                            <option value="">Любая основа</option>
                            @foreach ($bases as $base)
                                <option value="{{ $base }}" {{ request()->get('base') == $base ? 'selected' : '' }}>
                                    {{ $base }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <h4 class="filter-group-title">Цвет</h4>
                        <select name="color" class="filter-select">
                            <option value="">Любой цвет</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color }}" {{ request()->get('color') == $color ? 'selected' : '' }}>
                                    {{ $color }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-group">
                        <h4 class="filter-group-title">Вес/Объем</h4>
                        <select name="weight" class="filter-select">
                            <option value="">Выберите вес/объем</option>
                            @foreach ($weights as $weight)
                                <option value="{{ $weight }}" {{ request()->get('weight') == $weight ? 'selected' : '' }}>
                                    {{ $weight }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Здесь будут добавлены специфичные фильтры по материалам, если будет реализована серверная логика --}}

                    {{-- Пример placeholder для специфичного фильтра --}}
                    @if(request()->get('category') && !in_array(request()->get('category'), $toolCategories))
                    <div class="filter-group">
                        <h4 class="filter-group-title">Температура применения</h4>
                         <select name="tempa" class="filter-select">
                             <option value="">Любая температура</option>
                             @foreach ($tempas as $tempa)
                                 <option value="{{ $tempa }}" {{ request()->get('tempa') == $tempa ? 'selected' : '' }}>
                                     {{ $tempa }}°C
                                 </option>
                             @endforeach
                         </select>
                     </div>

                     <div class="filter-group">
                        <h4 class="filter-group-title">Время застывания</h4>
                         <select name="time" class="filter-select">
                             <option value="">Любое время</option>
                             @foreach ($times as $time)
                                 <option value="{{ $time }}" {{ request()->get('time') == $time ? 'selected' : '' }}>
                                     {{ $time }} ч.
                                 </option>
                             @endforeach
                         </select>
                     </div>
                     @endif

                </div>
                @endif

                <div class="filter-actions">
                    <button type="submit" class="apply-filters">Показать</button>
                    <a href="/catalog" class="reset-filters">Сбросить фильтры</a>
                </div>

            </form>
        </aside>

        <!-- Основной контент -->
        <div class="catalog-content">
            <div class="products-grid">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <div class="card1">
                            @if($product->is_new)
                                <div class="product-badge badge-new">Новинка</div>
                            @endif
                            @if($product->discount > 0)
                                <div class="product-badge badge-sale">-{{ $product->discount }}%</div>
                            @endif
                            @if(isset($hitsByCategory[$product->product_type]) && in_array($product->id, $hitsByCategory[$product->product_type]))
                                <div class="product-badge badge-hit">Хит</div>
                            @endif
                            <a href="/product/{{ $product->id }}" class="product-link">
                                <img src="{{ Vite::asset('resources/media/images/' . $product->img) }}" alt="{{ $product->title }}" class="hit-image">
                                <h3 class="hit-title">{{ $product->title }}</h3>
                                <div class="hit-info">
                                    <div class="hit-property">
                                        <span>Страна производителя:</span>
                                        <span>{{ $product->country }}</span>
                                    </div>
                                    @if ($product->weight)
                                    <div class="hit-property">
                                        <span>Вес:</span>
                                        <span>{{ $product->weight }}</span>
                                    </div>
                                    @elseif ($product->obiem)
                                    <div class="hit-property">
                                        <span>Объем:</span>
                                        <span>{{ $product->obiem }}</span>
                                    </div>
                                    @endif
                                </div>
                                <div class="product-rating">
                                    <div class="rating-stars">
                                        @php
                                            $rating = $product->reviews_avg_rating ?? 0;
                                            $fullStars = floor($rating);
                                            $hasHalfStar = $rating - $fullStars >= 0.5;
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $fullStars)
                                                <i class="fas fa-star"></i>
                                            @elseif ($i == $fullStars + 1 && $hasHalfStar)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <span class="rating-count">({{ $product->reviews_count }})</span>
                                </div>
                                <div class="hit-price">{{ number_format($product->price, 0, ',', ' ') }} ₽</div>
                            </a>
                            <div class="hit-actions">
                                <button class="btn-add-cart" onclick="addToCart(event, '{{ $product->id }}')" type="button">
                                    В корзину
                                </button>
                                <button class="btn-favorite-catalog @if(auth()->check() && auth()->user()->favorites->contains(''.$product->id)) active @endif" onclick="toggleFavorite(event, '{{ $product->id }}')" type="button">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-results">Ничего не найдено</div>
                @endif
            </div>
            <div class="pagination">
                {{ $products->onEachSide(1)->links('vendor.pagination.number') }}
            </div>
        </div>
    </div>
</div>

<!-- Модальное окно для авторизации -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="authModalLabel">Требуется авторизация</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Для выполнения этого действия необходимо авторизоваться или зарегистрироваться.</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-primary">Войти</a>
                <a href="{{ route('register') }}" class="btn btn-secondary">Зарегистрироваться</a>
            </div>
        </div>
    </div>
</div>

<style>
/* Стили для модального окна авторизации */
.modal-content {
    background: #fff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.modal-header {
    background: #fff;
    border-bottom: 1px solid #eee;
    padding: 0.75rem 1rem;
}

.modal-title {
    font-family: 'Unbounded', sans-serif;
    font-size: 18px;
    font-weight: 500;
    color: #333;
    margin: 0;
}

.modal-body {
    padding: 1rem;
    color: #333;
    font-size: 16px;
    font-family: 'Unbounded', sans-serif;
}

.modal-footer {
    border-top: 1px solid #eee;
    padding: 0.75rem 1rem;
}

.modal-footer .btn {
    font-family: 'Unbounded', sans-serif;
    font-size: 14px;
    padding: 0.5rem 1rem;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.modal-footer .btn-primary {
    background-color: #d20d0d;
    border-color: #d20d0d;
}

.modal-footer .btn-primary:hover {
    background-color: #b00b0b;
    border-color: #b00b0b;
}

.modal-footer .btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.modal-footer .btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

.btn-close {
    opacity: 0.5;
    transition: opacity 0.2s;
}

.btn-close:hover {
    opacity: 1;
}

/* Анимация появления */
.modal.fade .modal-dialog {
    transform: translateY(-20px);
    transition: transform 0.3s ease-out;
}

.modal.show .modal-dialog {
    transform: none;
}

/* Предотвращение сдвига страницы при открытии модального окна */
body.modal-open {
    padding-right: 0 !important;
    overflow: hidden;
}

.modal-open .modal {
    padding-right: 0 !important;
}

.modal {
    padding-right: 0 !important;
}
</style>

<script>
function showNotification() {
    const notification = document.getElementById('cartNotification');
    notification.classList.add('show');
    
    // Скрываем уведомление через 3 секунды
    setTimeout(() => {
        notification.classList.remove('show');
    }, 3000);
}

function showAuthModal() {
    const authModal = new bootstrap.Modal(document.getElementById('authModal'));
    authModal.show();
}

function addToCart(event, productId) {
    event.preventDefault();
    fetch('/add-to-cart/' + productId, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (response.status === 401) {
            showAuthModal();
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data && data.success) {
            showNotification();
            // Возможно, здесь нужно обновить отображение количества товара на карточке без перезагрузки страницы
            // Для этого потребуется найти элемент с количеством и обновить его текст
        } else if (data && data.message) {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Произошла ошибка при добавлении товара');
    });
}

function toggleFavorite(event, productId) {
    event.preventDefault();
    fetch('/favorites/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => {
        if (response.status === 401) {
            showAuthModal();
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data && data.status === 'added') {
            event.target.closest('.btn-favorite-catalog').classList.add('active');
        } else if (data && data.status === 'removed') {
            event.target.closest('.btn-favorite-catalog').classList.remove('active');
        }
    });
}

function toggleCompare(event, productId) {
    event.preventDefault();
    fetch('/comparisons/toggle', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => {
        if (response.status === 401) {
            showAuthModal();
            return;
        }
        return response.json();
    })
    .then(data => {
        if (data && data.status === 'added') {
            event.target.closest('.compare-btn').classList.add('active');
        } else if (data && data.status === 'removed') {
            event.target.closest('.compare-btn').classList.remove('active');
        } else if (data && data.status === 'error') {
            alert(data.message);
        }
    });
}
</script>
@endsection