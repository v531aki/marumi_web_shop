@extends('layouts.dashboard')

@section('content')
<h1>ランキング管理</h1>

<div class="w-75 mt-2">
    <table class="table table-responsive mt-5">
        <thead>
            <tr>
                <th scope="col">ランキング</th>
                <th scope="col">商品ID</th>
                <th scope="col">画像</th>
                <th scope="col">商品名</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            {{$i=0}}
            @foreach($products as $product)
            {{$i++}}
            <tr>
                <th scope="row">{{ $i }}位</td>
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset('img/dummy.jpg')}}" class="img-fluid h-10"></td>
                <td>{{ $product->name }}</td>

                <td>
                    <a href="/dashboard/products/{{ $product->id }}/edit" class="dashboard-edit-link">編集</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
