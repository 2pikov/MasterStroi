@extends('layouts.app')

@section('content')
<div class="admin-container">
<div class="container orders-container">
    <div class="admin-header">
        <h1>Управление заказами</h1>
        
        <div class="filters">
            <a href="{{ route('admin.orders') }}" class="filter-link {{ !request('filter') ? 'active' : '' }}">
                Все заказы
            </a>
            <a href="{{ route('admin.orders', ['filter' => 'new']) }}" class="filter-link {{ request('filter') === 'new' ? 'active' : '' }}">
                Новые
            </a>
            <a href="{{ route('admin.orders', ['filter' => 'confirmed']) }}" class="filter-link {{ request('filter') === 'confirmed' ? 'active' : '' }}">
                Подтвержденные
            </a>
            <a href="{{ route('admin.orders', ['filter' => 'canceled']) }}" class="filter-link {{ request('filter') === 'canceled' ? 'active' : '' }}">
                Отмененные
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="orders-list">
        @forelse($orders as $order)
            <div class="order-card card mb-3">
                <div class="card-header order-header">
                    <div class="order-info">
                        <h2 class="card-title">Заказ №{{ $order['number'] }}</h2>
                        <div class="order-meta">
                            <span class="order-date">{{ \Carbon\Carbon::parse($order['created_at'])->format('d.m.Y H:i') }}</span>
                            <span class="order-status status-{{ strtolower($order['status']) }} badge rounded-pill">
                                @if($order['status'] === 'Новый')
                                    Новый
                                @elseif($order['status'] === 'Подтвержден')
                                    Подтвержден
                                @elseif($order['status'] === 'Отменен')
                                    Отменен
                                @else
                                    {{ $order['status'] }}
                                @endif
                            </span>
                        </div>
                        <div class="customer-info card-text">
                            <p><strong>Заказчик:</strong> {{ $order['customer'] }}</p>
                            <p><strong>Телефон:</strong> {{ $order['phone'] }}</p>
                            <p><strong>Email:</strong> {{ $order['email'] }}</p>
                            <p><strong>Адрес:</strong> {{ $order['address'] }}</p>
                        </div>
                    </div>
                    
                    @if($order['status'] === 'Новый')
                        <div class="order-actions">
                            <form action="{{ route('admin.orders.status', ['number' => $order['number'], 'action' => 'confirm']) }}" method="POST" class="d-inline me-2">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Подтвердить</button>
                            </form>
                            
                            <form action="{{ route('admin.orders.status', ['number' => $order['number'], 'action' => 'cancel']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите отменить заказ?')">
                                    Отменить
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <div class="card-body order-items">
                    <h5 class="card-subtitle mb-2 text-muted">Товары в заказе:</h5>
                    @foreach($order['items'] as $item)
                        <div class="order-item d-flex justify-content-between">
                            <div class="item-info">
                                <span class="item-title">{{ $item['title'] }}</span>
                                <span class="item-quantity text-muted">{{ $item['quantity'] }} шт.</span>
                            </div>
                            <span class="item-price font-weight-bold">{{ number_format($item['total'], 0, '.', ' ') }} ₽</span>
                        </div>
                    @endforeach
                </div>

                <div class="card-footer order-footer">
                    <div class="order-total d-flex justify-content-between">
                        <span>Всего товаров: {{ $order['total_items'] }} шт.</span>
                        <span>Итого: <strong class="text-primary">{{ number_format($order['total_sum'], 0, '.', ' ') }} ₽</strong></span>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-orders alert alert-info">
                Заказов не найдено
            </div>
        @endforelse
    </div>
</div>
</div>

@endsection
