<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\PNF;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $areas = Area::when($search, fn($query, $search) => 
            $query->where('name', 'like', "%{$search}%"))
            ->get();

        $pnfs = PNF::getOptions();

        return view('areas', [
            'areas' => $areas,
            'pnfs' => $pnfs,
            'search' => $search,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'unique:areas', 'max:255'],
            'pnf_id' => ['required']
        ]);

        Area::create($data);

        return redirect()->back()
            ->withSuccess('El área se ha añadido con éxito');
    }

    public function edit(Area $area)
    {
        $areas = Area::all();
        $pnfs = PNF::getOptions();

        return view('areas', [
            'areas' => $areas,
            'areaToEdit' => $area,
            'pnfs' => $pnfs
        ]);
    }

    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'pnf_id' => ['required']
        ]);

        $area->update($data);
        // TODO -> hacer que mande error y tal si salió algo mal
        return redirect()->route('areas.index')
            ->withWarning('El área se ha editado con éxito');
    }

    public function destroy(Area $area) {
        $area->delete();
        // TODO -> hacer que muestre modal de confirmación
        return redirect()->route('areas.index')
            ->withDanger('El área se ha eliminado con éxito');
    }
}
