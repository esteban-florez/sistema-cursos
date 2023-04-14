<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    public function __invoke()
    {
        return view('history', [
            'histories' => History::paginate(10),
        ]);
    }
}
