@extends('layouts.app')

@section('content')
    <a href="{{ route('orders.index') }}">発注一覧に戻る</a>

    <h1>アイテム一覧</h1>

    <table class="table">
        <thead>
            <tr>
                <th>商品名</th>
                <th>総量</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->total_quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
