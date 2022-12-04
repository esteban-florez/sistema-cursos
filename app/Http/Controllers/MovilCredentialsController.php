<?php

namespace App\Http\Controllers;

use App\Models\MovilCredentials;
use Illuminate\Http\Request;

class MovilCredentialsController extends Controller
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
            'phone' => ['required', 'string', 'size:12'],
        ]);

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
    public function update(Request $request)
    {
        $data = $request->validate([
            'ci' => ['required', 'string', 'max:12'],
            'bank' => ['required', 'string'],
            'phone' => ['required', 'string', 'size:12'],
        ]);

        MovilCredentials::first()->update($data);

        return redirect()
            ->route('credentials.index')
            ->withWarning('Las credenciales se han actualizado con éxito.');
    }
}
