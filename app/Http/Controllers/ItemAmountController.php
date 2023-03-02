<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemAmountController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

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
