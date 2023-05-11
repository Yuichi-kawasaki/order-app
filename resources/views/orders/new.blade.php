<h1>発注登録</h1>

<form action="{{ route('orders.create') }}" method="post">
  @csrf
  <table border=1>
    <thead>
      <tr>
        <td>商品名</td>
        <td>注文数</td>
      </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
          <td>{{ $item->name }}</td>
          <td><input type="number" name="ordered_lists[{{ $item->id }}][quantity]" min="0" max="10"></td>
        </tr>
        <input type="hidden" name="ordered_lists[{{ $item->id }}][item_id]" value="{{ $item->id }}">
    @endforeach
    </tbody>
  </table>
  <button type="submit">注文する</button>
</form>
