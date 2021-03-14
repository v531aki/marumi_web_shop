@extends('layouts.dashboard')

@section('content')
<div class="w-50">
    <h1>{{ $ranking->id }}位の商品選択</h1>
    <form method="GET" action="dashboard/ranking/{{ $ranking }}/edit" class="form-inline">
        並び替え
        <select name="sort" onChange="this.form.submit();" class="form-inline ml-2">
            @foreach ($sort as $key => $value)
            @if ($sorted == $value)
            <option value=" {{ $value }}" selected>{{ $key }}</option>
            @else
            <option value=" {{ $value }}">{{ $key }}</option>
            @endif
            @endforeach
        </select>
    </form>
    <div class="w-75 mt-2">
        <div class="w-75">
            <form method="GET" action="dashboard/ranking/{{ $ranking }}/edit">
                <div class="d-flex flex-inline form-group">
                    <div class="d-flex align-items-center">
                        商品ID・商品名
                    </div>
                    <textarea id="search-products" name="keyword" class="form-controll ml-2 w-50">{{$keyword}}</textarea>
                </div>
                <button type="submit" class="btn marumi-submit-button">検索</button>
            </form>
        </div>
        <div class="d-flex justify-content-between w-75 mt-4">
            <h3>合計{{$total_count}}件</h3>
        </div>
        <form method="POST" action="/dashboard/ranking/{{ $ranking->id }}" class="mb-5">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="POST">
            <table class="table table-responsive mt-5">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">画像</th>
                        <th scope="col">商品名</th>
                        <th scope="col">説明</th>
                        <th scope="col">巾</th>
                        <th scope="col">最小購入数</th>
                        <th scope="col">価格</th>
                        <th scope="col">在庫</th>
                        <th scope="col">特集</th>
                        <th scope="col">再入荷予定日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            <input type="radio" name="product_id" value="{{ $product->id }}">
                        </td>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{ asset('img/dummy.jpg')}}" class="img-fluid h-10"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->width }}</td>
                        <td>{{ $product->moq }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->special_feature }}</td>
                        <td>{{ $product->restock }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <button type="submit" class="w-25 btn marumi-submit-button">更新</button>
            </div>
        </form>
    </div>
    {{ $products->links() }}
    <div class="d-flex justify-content-end">
        <a href="/dashboard/rankings">ランキングに戻る</a>
    </div>
</div>
@endsection 