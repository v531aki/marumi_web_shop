@extends('layouts.app')

@section('content')
<div class="col-md-7">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>投稿する</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method="POST" action="/sewpad" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="post">
                    <div class="form-inline form-group">
                        <label for="title">作品のタイトル：</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="img">作品の写真</label>
                        <img src="#" id="img-preview">
                        <div class="d-flex flex-column ml-2">
                            <label for="collection-img" class="btn marumi-submit-button">画像を選択</label>
                            <input type="file" name="collection-img" id="collection-img" onChange="handleImage(this.files)" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="collection-description">作品の説明</label>
                        <textarea name="collection-description" id="collection-description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="material">材料の登録</label>
                        <input type="text" name="material" id="material" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="URL-title">参考にしたサイトのタイトル</label>
                        <input type="text" name="URL-title" id="URL-title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="URL">参考にしたサイトのURL</label>
                        <input type="text" name="URL" id="URL" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="img">作品の写真</label>
                        <img src="#" id="img-preview">
                        <div class="d-flex flex-column ml-2">
                            <label for="collection-img" class="btn marumi-submit-button">画像を選択</label>
                            <input type="file" name="collection-img" id="collection-img" onChange="handleImage(this.files)" style="display: none;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">難しかった点・こだわった点</label>
                        <input type="text" name="comment" id="comment" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-danger">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#product-image").change(function() {
        if (this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $("#product-image-preview").attr("src", e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endsection