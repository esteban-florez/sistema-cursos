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

    public function store(StoreMovilCredentialsRequest $request)
    {
        $data = $request->validated();

        MovilCredentials::create($data);

        return redirect()
            ->route('credentials.index')
            ->with('alert', trans('alerts.credentials.created'));
    }

    public function update(UpdateMovilCredentialsRequest $request)
    {
        $data = $request->validated();

        MovilCredentials::first()->update($data);

        return redirect()
            ->route('credentials.index')
            ->with('alert', trans('alerts.credentials.updated'));
    }
}
