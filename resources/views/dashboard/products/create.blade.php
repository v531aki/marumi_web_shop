@extends('layouts.dashboard')

@section('content')

<div class="dashboard-container">
    <h1>商品登録</h1>
    
    <form method="POST" action="/dashboard/products">
        {{ csrf_field() }}
        <div class="form-inline row">
            <label for="product_name">商品名</label>
            <input type="text" name="name" id="product_name">
        </div>
        <div class="form-inline row">
            <label for="width">巾</label>
            <input type="text" name="width" id="width">
        </div>
        <div class="form-inline row">
            <label for="moq">1に対する長さ</label>
            <input type="text" name="moq" id="moq">
        </div>
        <div class="form-inline row">
            <label for="description">説明</label>
            <input type="text" name="description" id="description">
        </div>
        <div class="form-inline row">
            <label for="price">価格</label>
            <input type="text" name="price" id="price">
        </div>
        <div class="form-inline row">
            <label for="stock">在庫</label>
            <input type="text" name="stock" id="stock">
        </div>
        <div class="form-inline row">
            <label for="special_feature">適用する特集</label>
            <input type="text" name="special_feature" id="special_feature">
        </div>
        <div class="form-inline row">
            <label for="restock">再入荷予定</label>
            <input type="date" name="restock" id="restock">
        </div>
        <div>
            <label for="categories">カテゴリー</label>
            @foreach ($major_category_names as $major_category_name)
            <div>
                <h2>{{ $major_category_name }}</h2>
                @foreach ($categories as $category)
                    @if ($category->major_category_name === $major_category_name)
                        <input type="checkbox" id="categories" name="categories[]" value="{{ $category->id }}">{{ $category->name }}
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn samazon-submit-button">商品を登録</button>
        </div>
    </form>
</div>

@endsection

