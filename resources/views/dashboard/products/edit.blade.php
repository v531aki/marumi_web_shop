@extends('layouts.dashboard')

@section('content')
<div class="col-9">
    <h1>商品登録</h1>

    <hr>

    <form method="POST" action="/dashboard/products/{{ $product->id }}" class="mb-5" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-inline mt-4 mb-4 row">
            <label for="product-name" class="col-2 d-flex justify-content-start">商品名</label>
            <input type="text" name="name" id="product-name" class="form-control col-8" value="{{ $product->name }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="top_img" class="col-2 d-flex justify-content-start">トップ画像</label>
            <div class="row">
                @foreach($imgs as $img)
                <div class="col-3">
                    <input type="radio" name="top_img" id="top_img" class="form-control" value="{{ $img }}">
                    <div class="products-img"><p class="center"><img src="{{ $img }}" alt="画像"></p></div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label for="width" class="col-2 d-flex justify-content-start">巾</label>
            <input type="text" name="width" id="width" class="form-control col-8" value="{{ $product->width }}">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label class="col-2 d-flex justify-content-start">画像</label>
            @if ($product->image !== null)
            <img src="{{ asset('storage/products/'.$product->image) }}" id="product-image-preview" class="img-fluid w-25">
            @else
            <img src="#" id="product-image-preview">
            @endif
            <div class="d-flex flex-column ml-2">
                <small class="mb-3">600px×600px推奨。<br>商品の魅力が伝わる画像をアップロードして下さい。</small>
                <label for="product-image" class="btn samazon-submit-button">画像を選択</label>
                <input type="file" name="image" id="product-image" onChange="handleImage(this.files)" style="display: none;">
            </div>
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
                        @if (in_array($category->id, $category_id))
                            <input type="checkbox" id="categories" name="category_ids[]" value="{{ $category->id }}" checked>
                        @else
                            <input type="checkbox" id="categories" name="category_ids[]" value="{{ $category->id }}">
                        @endif
                        {{ $category->name }}
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

<script type="text/javascript">
    function handleImage(image) {
        let reader = new FileReader();
        reader.onload = function() {
            let imagePreview = document.getElementById("product-image-preview");
            imagePreview.src = reader.result;
        }
        console.log(image);
        reader.readAsDataURL(image[0]);
    }
</script>
@endsection 