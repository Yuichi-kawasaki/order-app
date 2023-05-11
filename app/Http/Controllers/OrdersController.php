<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Item;
use App\Models\OrderedList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin')->only('new', 'create');
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    public function new()
    {
        $order = new Order();
        $items = Item::orderBy('created_at')->get();
        return view('orders.new', compact('order', 'items'));
    }

    public function create(Request $request)
    {
        $orderedLists = $request->input('ordered_lists');
        $totalPrice = 0;
    
        foreach ($orderedLists as $orderedList) {
            $item = Item::find($orderedList['item_id']);
            $item->total_quantity += $orderedList['quantity'];
            $item->save();
    
            $totalPrice += $item->price * $orderedList['quantity'];
        }

        $order = new Order();
        $items = Item::all();
        $order->user_id = Auth::user()->id;
        $order->save();
    
        foreach ($items as $item) {
            $itemId = $item['id'];
            $quantity = $request->input("ordered_lists.{$itemId}.quantity");
            if ($quantity !== null && $quantity !== 0) {
                $orderedList = new OrderedList();
                $orderedList->item_id = $itemId;
                $orderedList->order_id = $order->id;
                $orderedList->quantity = $quantity;
                $orderedList->save();
            }
        }
    
        return redirect()->route('orders.index')->with('status', '発注が完了しました。');
    }
    
}
