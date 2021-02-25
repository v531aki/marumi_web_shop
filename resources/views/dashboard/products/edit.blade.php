@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>商品登録</h1>

    <hr>

    <form method="POST" action="/dashboard/products/{{ $product->id }}" class="mb-5">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-name" class="col-2 d-flex justify-content-start">商品名</label>
            <input type="text" name="name" id="product-name" class="form-control col-8" value="{{ $product->name }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="width" class="col-2 d-flex justify-content-start">巾</label>
            <input type="text" name="width" id="width" class="form-control col-8" value="{{ $product->width }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="moq" class="col-2 d-flex justify-content-start">最小購入数</label>
            <input type="text" name="moq" id="moq" class="form-control col-8" value="{{ $product->moq }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="description" class="col-2 d-flex justify-content-start">商品説明</label>
            <input type="text" name="description" id="description" class="form-control col-8" value="{{ $product->description }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="price" class="col-2 d-flex justify-content-start">価格</label>
            <input type="number" name="price" id="price" class="form-control col-8" value="{{ $product->price }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="stock" class="col-2 d-flex justify-content-start">在庫</label>
            <input type="number" name="stock" id="stock" class="form-control col-8" value="{{ $product->stock }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="special_feature" class="col-2 d-flex justify-content-start">適用する特集</label>
            <input type="text" name="special_feature" id="special_feature" class="form-control col-8" value="{{ $product->special_feature }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="restock" class="col-2 d-flex justify-content-start">適用する特集</label>
            <input type="date" name="restock" id="restock" class="form-control col-8" value="{{ $product->restock }}">
        </div>

        <div class="form-inline mt-4 mb-4 row">
        <label for="categories">カテゴリー</label>
            @foreach ($major_category_names as $major_category_name)
            <div>
                <h2>{{ $major_category_name }}</h2>
                @foreach ($categories as $category)
                    @if ($category->major_category_name === $major_category_name)
                        <input type="checkbox" id="categories" name="category_ids[]" value="{{ $category->id }}">{{ $category->name }}
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn samazon-submit-button">更新</button>
        </div>
    </form>

    <div class="d-flex justify-content-end">
        <a href="/dashboard/products">商品一覧に戻る</a>
    </div>
</div>
@endsection 