<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovilCredentialsRequest;
use App\Http\Requests\UpdateMovilCredentialsRequest;
use App\Models\MovilCredentials;

class MovilCredentialsController extends Controller
{
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
            ->withSuccess('Las credenciales se han añadido con éxito.');
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
            ->withWarning('Las credenciales se han actualizado con éxito.');
    }
}
