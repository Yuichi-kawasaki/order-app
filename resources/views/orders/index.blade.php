@extends('layouts.app')

@section('content')
  <div class="mb-3">
    @if (Auth::check() && Auth::user()->is_admin())
    <a href="{{ route('items.index') }}">発注総量</a>
    @endif
    @if (Auth::check())
    <a href="{{ route('orders.new') }}" class="btn btn-primary">発注する</a>
    <a href="{{ route('sessions.destroy') }}">ログアウト</a>
    @endif
    <h1>発注一覧</h1>
  </div>

  @if ($orders->count() == 0)
    <p>データがありません。</p>
  @else
    @foreach ($orders as $order)
      <p>
        <strong>発注日時:</strong>
        {{ $order->created_at->format('m/d H:i') }}
      </p>

      <table border=1>
        <thead>
          <tr>
            <td width=100px>商品名</td>
            <td>注文数</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($order->orderedLists()->orderBy('item_id', 'asc')->get() as $ordered_list)
            @if ($ordered_list->quantity != 0)
              <tr>
                <td>{{ App\Models\Item::find($ordered_list->item_id)->name }}</td>
                <td>{{ $ordered_list->quantity }}</td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    @endforeach
  @endif
@endsection
