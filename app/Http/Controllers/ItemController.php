<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10)
            ->withQueryString();
        
        return view('items', [
            'items' => $items,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:50'],
        ]);

        Item::create($data);

        return redirect()
            ->route('items.index')
            ->with('alert', trans('alerts.items.created'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4', 'max:100'],
            'description' => ['required', 'string', 'min:20', 'max:50'],
        ]);        

        $item->update($data);

        return redirect()
            ->route('items.index')
            ->with('alert', trans('alerts.items.updated'));
    }
}
