<?php

namespace App\Http\Controllers;

use App\Models\PNF;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PNFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pnfs.index', [
            'pnfs' => PNF::all()
                ->where('name', '!=', 'Extensión Universitaria'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pnfs.create');
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
            'name' => ['required', 'string', 'max:255', 'min:4', 'unique:pnfs'],
            'leader' => ['required', 'string', 'max:255', 'min:4'],
        ]);

        PNF::create($data);

        return redirect()
            ->route('pnfs.index')
            ->with('alert', trans('alerts.pnf.created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PNF  $pnf
     * @return \Illuminate\Http\Response
     */
    public function edit(PNF $pnf)
    {
        return view('pnfs.edit', [
            'pnf' => $pnf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PNF  $pnf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PNF $pnf)
    {
        $data = $request->validate([
            'name' => [
                'required', 'string', 'max:255', 'min:4',
                Rule::unique('pnfs')->ignoreModel($pnf)
            ],
            'leader' => ['required', 'string', 'max:255', 'min:4'],
        ]);

        $pnf->update($data);

        return redirect()
            ->route('pnfs.index')
            ->with('alert', trans('alerts.pnf.updated'));
    }
}
