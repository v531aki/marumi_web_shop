<h1>New Products</h1>

<form method="POST" action="/products">
    {{ csrf_field() }}
    <label>名前<input type="text" name="name"></label>
    <label>巾<input type="number" name="width"></label>
    <label>MOQ<input type="number" name="moq"></label>
    <label>説明<textarea name="description"></textarea></label>
    <label>単価<input type="number" name="price"></label>
    <label>在庫<input type="number" name="stock"></label>
    <label>特集<input type="number" name="special_feature"></label>
    <label><input type="checkbox" name="restock" value="true">再入荷予定</label>
    
    <h3>category</h3>
    
    <h4>材質</h4>
    @foreach($categories as $category)
        @if($category->major_category_name == "材質")
        <label><input type="checkbox" name="category[]" value="{{$category->id}}">{{$category->name}}</label>
        @endif
    @endforeach
    <br>
    <h4>柄</h4>
    @foreach($categories as $category)
        @if($category->major_category_name == "柄")
        <label><input type="checkbox" name="category[]" value="{{$category->id}}">{{$category->name}}</label>
        @endif
    @endforeach
    <br>
    <h4>色</h4>
    @foreach($categories as $category)
        @if($category->major_category_name == "色")
        <label><input type="checkbox" name="category[]" value="{{$category->id}}">{{$category->name}}</label>
        @endif
    @endforeach
    <button type="submit">Create</button>
</form>

<a href="/products">Back</a>