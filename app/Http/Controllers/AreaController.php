<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index() {
        $areas = Area::all();

        return view('areas', ['areas' => $areas]);
    }

    public function store(Request $request) {
        $input = $request->validate([
            'name' => 'required|unique:areas|max:255',
            'pnf_name' => 'required_if:is_pnf,on|unique:areas|max:255'
        ]);

        // $is_pnf = $request->boolean('is_pnf');
        // $input['is_pnf'] = $is_pnf;
        
        $res = Area::create($input);
        logger($res);
        return redirect()->route('areas.index');
    }
}
