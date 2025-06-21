@extends('layouts.app')
@section('content')
<div class="admin-container">
    <div class="container">
        <h1>Редактировать товар</h1>
        <div class="form-scroll-wrapper">
            <form action="/product-update/{{$product->id}}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Название</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                </div>
                <div class="mb-3">
                    <label for="qty" class="form-label">Количество</label>
                    <input type="number" class="form-control" id="qty" name="qty" value="{{ $product->qty }}">
                </div>
                 <div class="mb-3">
                    <label for="color" class="form-label">Цвет</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ $product->color }}">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Изображение</label>
                    <input type="text" class="form-control" id="img" name="img" value="{{ $product->img }}" placeholder="Введите название изображения с расширением файла из resources/media/images">
                </div>
                 <div class="mb-3">
                    <label for="country" class="form-label">Страна-производитель</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ $product->country }}">
                </div>
                 <div class="mb-3">
                    <label for="category" class="form-label">Категория</label>
                     <select name="category" id="category" class="form-control">
                        @foreach ($categories as $category)
                             <option value="{{ $category->id }}" {{ $product->product_type == $category->id ? 'selected' : '' }}>{{ $category->product_type }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </form>
        </div>
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .container {
            padding: 0 20px;
        }
        h1 {
            font-size: 24px;
        }
        .form-scroll-wrapper {
            overflow-x: auto;
            padding-bottom: 15px;
        }
        .form-scroll-wrapper form {
            min-width: 500px;
        }
    }

    @media (max-width: 576px) {
        .form-label {
            font-size: 14px;
        }
        .form-control {
            font-size: 14px;
            padding: 8px 12px;
        }
        .btn {
            font-size: 14px;
            padding: 8px 16px;
        }
    }
</style>
@endsection
