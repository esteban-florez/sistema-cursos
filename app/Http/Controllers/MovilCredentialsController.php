<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovilCredentialsRequest;
use App\Http\Requests\UpdateMovilCredentialsRequest;
use App\Models\MovilCredentials;

class MovilCredentialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovilCredentialsRequest $request)
    {
        $data = $request->validated();

        MovilCredentials::create($data);

        return redirect()
            ->route('credentials.index')
            ->with('alert', trans('alerts.credentials.created'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovilCredentialsRequest $request)
    {
        $data = $request->validated();

        MovilCredentials::first()->update($data);

        return redirect()
            ->route('credentials.index')
            ->with('alert', trans('alerts.credentials.updated'));
    }
}
