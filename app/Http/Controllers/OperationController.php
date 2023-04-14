<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationRequest;
use App\Models\Item;
use App\Models\Operation;
use App\Services\Input;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Operation::class);
    }

    public function index(Request $request)
    {
        $filters = Input::getFilters();
        $sort = $request->query('sort');
        $search = $request->query('search');

        $operations = Operation::latest()
            ->filters($filters)
            ->sort($sort)
            ->search($search)
            ->paginate(10)
            ->withQueryString();

        return view('operations.index', [
            'operations' => $operations,
            'items' => Item::getOptions(),
            'sort' => $sort,
            'filters' => $filters,
            'search' => $search,
        ]);
    }

    public function create()
    {
        return view('operations.create', [
            'items' => Item::optionsAndStock(),
        ]);
    }

    public function store(OperationRequest $request)
    {
        $data = $request->validated();
        
        Operation::create($data);

        return redirect()
            ->route('items.stock.index')
            ->with('alert', trans('alerts.operations'));
    }
}
