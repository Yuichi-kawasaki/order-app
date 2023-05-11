<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(['index']);
    }

    public function index()
    {
        $items = Item::orderBy('created_at')->get();
        return view('items.index', compact('items'));
    }
}
