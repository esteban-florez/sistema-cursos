<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Item::class);
    }

    public function index()
    {
        $items = Item::paginate(6)
            ->withQueryString();
        
        return view('items.index', [
            'items' => $items,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'numeric', 'string', 'digits_between:1,5'],
            'name' => ['required', 'string', 'min:4', 'max:40'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
        ]);

        Item::create($data);

        return back()
            ->with('alert', trans('alerts.items.created'));
    }

    public function edit(Item $item)
    {
        return view('items.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'code' => ['required', 'numeric', 'string', 'digits_between:1,5'],
            'name' => ['required', 'string', 'min:4', 'max:40'],
            'description' => ['required', 'string', 'min:10', 'max:100'],
        ]);        

        $item->update($data);

        return redirect()
            ->route('items.index')
            ->with('alert', trans('alerts.items.updated'));
    }
}
