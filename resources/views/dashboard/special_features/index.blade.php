@extends('layouts.dashboard')

@section('content')
<h1>特集管理</h1>
<div class="w-75 mt-2">
    <table class="table table-responsive mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">特集名</th>
                <th scope="col">特集説明</th>
                <th scope="col">写真</th>
                <th scope="col">開始日</th>
                <th scope="col">終了日</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($special_features as $special_feature)
            <tr>
                <th scope="row">{{ $special_feature->id }}</td>
                <th scope="row">{{ $special_feature->name }}</td>
                <th scope="row">{{ $special_feature->description }}</td>
                <th scope="row" class="products-img"><img src="{{ $special_feature->img }}" alt="画像"></td>
                <th scope="row">{{ $special_feature->start_at }}</td>
                <th scope="row">{{ $special_feature->finished_at }}</td>
                <td>
                    <a href="/dashboard/special_features/{{ $special_feature->id }}/edit" class="dashboard-edit-link">編集</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection