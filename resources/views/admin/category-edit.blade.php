@extends('layouts.app')

@section('content')
<div class="admin-container">
    <div class="container">
        <h1>Редактировать категорию</h1>
        <form action="/category-update/{{ $category->id }}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="product_type" class="form-label">Название типа продукта</label>
                <input type="text" class="form-control" id="product_type" name="product_type" value="{{ $category->product_type }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
</div>
@endsection
