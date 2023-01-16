<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransferCredentialsRequest;
use App\Http\Requests\UpdateTransferCredentialsRequest;
use App\Models\TransferCredentials;

class TransferCredentialsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransferCredentialsRequest $request)
    {
        $data = $request->validated();

        TransferCredentials::create($data);

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
    public function update(UpdateTransferCredentialsRequest $request)
    {
        $data = $request->validated();

        TransferCredentials::first()->update($data);

        return redirect()
            ->route('credentials.index')
            ->withWarning('Las credenciales se han actualizado con éxito.');
    }
}
