@extends('layouts.app')

@section('content')
    <div class="admin-container">
        <div class="container">
            <div class="admin-header">
                <h1>Создать категорию</h1>
            </div>
            <form action="/category-create" method="POST" class="admin-form">
                @csrf
                <div class="mb-3">
                    <label for="product_type" class="form-label">Название типа продукта</label>
                    <input type="text" class="form-control" id="product_type" name="product_type" required>
                </div>
                <button type="submit" class="btn btn-success">Создать</button>
            </form>
        </div>
    </div>
@endsection
