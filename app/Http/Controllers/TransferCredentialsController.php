<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransferCredentialsRequest;
use App\Http\Requests\UpdateTransferCredentialsRequest;
use App\Models\TransferCredentials;

class TransferCredentialsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }
    
    public function store(StoreTransferCredentialsRequest $request)
    {
        $data = $request->validated();

        TransferCredentials::create($data);

        return redirect()
            ->route('credentials.index')
            ->with('alert', trans('alerts.credentials.created'));
    }

    public function update(UpdateTransferCredentialsRequest $request)
    {
        $data = $request->validated();

        TransferCredentials::first()->update($data);

        return redirect()
            ->route('credentials.index')
            ->with('alert', trans('alerts.credentials.updated'));
    }
}
