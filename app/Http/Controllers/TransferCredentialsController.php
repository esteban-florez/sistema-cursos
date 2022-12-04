<?php

namespace App\Http\Controllers;

use App\Models\TransferCredentials;
use Illuminate\Http\Request;

class TransferCredentialsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ci' => ['required', 'string', 'max:12'],
            'bank' => ['required', 'string'],
            'name' => ['required', 'string'],
            'type' => ['required', 'string', 'in:Corriente,Ahorro'],
            'account' => ['required', 'string', 'max:20'],
        ]);

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
    public function update(Request $request)
    {
        $data = $request->validate([
            'ci' => ['required', 'string', 'max:12'],
            'bank' => ['required', 'string'],
            'name' => ['required', 'string'],
            'type' => ['required', 'string', 'in:Corrient,Ahorro'],
            'account' => ['required', 'string', 'max:20'],
        ]);

        TransferCredentials::first()->update($data);

        return redirect()
            ->route('credentials.index')
            ->withWarning('Las credenciales se han actualizado con éxito.');
    }
}
