<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Club;
use App\Models\Item;
use App\Models\Loan;

class ItemStockController extends Controller
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

        return view('items-stock.index', [
            'items' => $items,
            'itemOptions' => Item::getOptions(),
            'clubs' => Club::getOptions(),
        ]);
    }
}
