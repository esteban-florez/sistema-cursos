<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemAmountController extends Controller
{
    public function index()
    {
        $items = Item::latest()
            ->with('operations')
            ->paginate(10)
            ->withQueryString();

        return view('items-amount.index', [
            'items' => $items,
            'itemOptions' => Item::getOptions(),
        ]);
    }
}
