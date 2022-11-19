<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        return view('areas', ['areas' => $areas]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:areas|max:255',
            'is_pnf' => 'nullable',
            'pnf_name' => 'required_if:is_pnf,1|unique:areas|max:255'
        ]);

        Area::create($data);

        return redirect()->route('areas.index')
            ->withSuccess('El área se ha añadido con éxito');
    }

    public function edit(Area $area)
    {
        $areas = Area::all();

        return view('areas', [
            'areas' => $areas,
            'areaToEdit' => $area
        ]);
    }

    public function update(Request $request, Area $area)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'is_pnf' => 'nullable',
            'pnf_name' => ['required_if:is_pnf,1', 'max:255']
        ]);

        $data['is_pnf'] = $data['is_pnf'] ?? false;
        $data['pnf_name'] = $data['pnf_name'] ?? null;

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
