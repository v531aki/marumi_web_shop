@extends('layouts.dashboard')

@section('content')
<div class="w-75">
    <h1>特集情報更新</h1>

    <form method="POST" action="/dashboard/special_features/{{ $special_feature->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="post">
        <div class="form-group">
            <label for="special_feature-name">特集名</label>
            <input type="text" name="name" id="special_feature-name" class="form-control" value="{{ $special_feature->name }}">
        </div>
        <div class="form-group">
            <label for="special_feature-description">特集説明</label>
            <textarea name="description" id="special_feature-description" class="form-control">{{ $special_feature->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="special_feature-img">写真選択</label>
            <img src="#" id="product-image-preview">
            <div class="d-flex flex-column ml-2">
                <label for="product-image" class="btn marumi-submit-button">画像を選択</label>
                <input type="file" name="image" id="product-image" onChange="handleImage(this.files)" style="display: none;">
            </div>
        </div>
        <div class="form-group">
            <label for="special_feature-start_at">開始日</label>
            <input type="date" name="start_at" id="special_feature-start_at" class="form-control" value="{{ $special_feature->start_at }}">
        </div>
        <div class="form-group">
            <label for="special_feature-finished_at">終了日</label>
            <input type="date" name="finished_at" id="special_feature-finished_at" class="form-control" value="{{ $special_feature->finished_at }}">
        </div>
        <button type="submit" class="btn btn-danger">更新</button>
    </form>

    <a href="/dashboard/categories" class="mt-4">カテゴリ一覧に戻る</a>
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