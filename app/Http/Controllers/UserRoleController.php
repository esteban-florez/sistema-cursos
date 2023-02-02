<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => ['required', 'in:'.roles()->join(',')],
        ]);

        $user->update($data);

        return back()
            ->with('alert', trans('alerts.user-role.updated'));
    }
}
