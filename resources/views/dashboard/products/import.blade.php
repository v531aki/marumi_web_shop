@extends('layouts.dashboard')

@section('content')
@if (session('flash_message'))
<div class="flash-success-bg w-25 text-center">
    <span class="flash-success-font">
        ✔ {{ session('flash_message') }}
    </span>
</div>
@endif

<div class="w-75">
    <h1>商品CSV登録</h1>
    <form method="POST" action="/dashboard/products/import/csv" class="form-inline" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="d-flex flex-column">
            <div class="d-flex flex-row">
                <label for="product-import-csv" class="btn samazon-button mr-3">CSVファイルを選択</label>
                <input type="file" name="csv" id="product-import-csv" style="display: none;" onChange="handleCSV(this.files)">
                <button class="btn samazon-submit-button">一括登録</button>
            </div>
            <small id="product-import-csv-filename"></small>
        </div>
    </form>

    <div class="d-flex justify-content-between mt-3">
        <h4 class="d-flex align-self-center mt-1 mb-0">CSVファイルフォーマット</h4>
        <a class="btn samazon-button" href="{{ asset('csv/products.csv') }}">雛形ファイルダウンロード</a>
        <a class="btn samazon-button" href="/dashboard/categories">カテゴリーリストはこちら</a>
    </div>

    <hr>

    <div class="row">
        <label class="col-3">name</label>
        <span class="col-9">商品名を入力してください</span>

        <label class="col-3">width</label>
        <span class="col-9">商品の巾を入力して下さい</span>

        <label class="col-3">moq</label>
        <span class="col-9">購入単位を入力してください</span>

        <label class="col-3">description</label>
        <span class="col-9">商品説明を入力してください</span>

        <label class="col-3">price</label>
        <span class="col-9">moqに対する単価を入力してください</span>

        <label class="col-3">stock</label>
        <span class="col-9">在庫数量を入力してください</span>
        
        <label class="col-3">special_feature</label>
        <span class="col-9">紐づける特集番号を入力してください。(未入力可)</span>
        
        <label class="col-3">restock</label>
        <span class="col-9">再入荷予定があれば、予定日を入力してください。(未入力可)</span>
        
        <label class="col-3">categories</label>
        <span class="col-9">カテゴリーをカンマ(,)区切りで入力してください。　例)1,2,3,4</span>
        
        <label class="col-3">path</label>
        <span class="col-9">画像ファイルを保存しているフォルダパスを入力してください</span>
        
        <label class="col-3">img_name</label>
        <span class="col-9">画像ファイルの名前をカンマ(,)区切りで入力してください。　例)ハリネズミ,きのこ</span>
    </div>

    <hr>
</div>

<script type="text/javascript">
    function handleCSV(csv) {
        let reader = new FileReader();
        reader.onload = function() {
            let csvName = document.getElementById("product-import-csv-filename");
            console.log(reader)
            csvName.innerHTML = csv[0].name;
        }
        console.log(csv);
        reader.readAsDataURL(csv[0]);
    }
</script>
@endsection 