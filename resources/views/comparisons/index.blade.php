@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/comparisons.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection

@section('content')
<div class="comparison-container">
    <div class="comparison-header">
        <h1>Сравнение товаров</h1>
    </div>

    @if($comparisons->count() == 0)
        <div class="alert no-comparisons-message">
            У вас нет товаров для сравнения
        </div>
    @else
        <div class="table-responsive comparison-table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Характеристика</th>
                        @foreach($comparisons as $comparison)
                            <th>
                                <a href="{{ route('product', $comparison->product->id) }}" class="product-link">{{ $comparison->product->title }}</a>
                                <button class="remove-comparison" 
                                        data-product-id="{{ $comparison->product->id }}"
                                        title="Удалить из сравнения">
                                    &times;
                                </button>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Изображение</td>
                        @foreach($comparisons as $comparison)
                            <td>
                                <a href="{{ route('product', $comparison->product->id) }}">
                                    <img src="{{ Vite::asset('resources/media/images/' . $comparison->product->img) }}" alt="{{ $comparison->product->title }}">
                                </a>
                            </td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Цена</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ number_format($comparison->product->price, 0, ',', ' ') }} ₽</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Вес</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ $comparison->product->weight ?? '—' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Цвет</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ $comparison->product->color ?? '—' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Основа</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ $comparison->product->osnova ?? '—' }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Температура применения</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ $comparison->product->tempa ?? '—' }}@if($comparison->product->tempa)°C @endif</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Время застывания</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ $comparison->product->time ?? '—' }}@if($comparison->product->time)ч. @endif</td>
                        @endforeach
                    </tr>
                    <tr>
                        <td>Срок годности</td>
                        @foreach($comparisons as $comparison)
                            <td>{{ $comparison->product->srok_godnosti ?? '—' }}@if($comparison->product->srok_godnosti)дн. @endif</td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Удаление одного товара
    document.querySelectorAll('.remove-comparison').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            fetch('/comparisons/toggle', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'removed') {
                    location.reload();
                } else if (data.status === 'error') {
                    alert(data.message);
                }
            });
        });
    });

    // Очистка всего сравнения
    /* const clearAllBtn = document.querySelector('.clear-all-btn');
    if (clearAllBtn) {
        clearAllBtn.addEventListener('click', function() {
            if (confirm('Вы уверены, что хотите очистить все сравнение?')) {
                fetch('{{ route("comparisons.clearAll") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'cleared') {
                        location.reload();
                    }
                });
            }
        });
    } */
});
</script>
@endsection 