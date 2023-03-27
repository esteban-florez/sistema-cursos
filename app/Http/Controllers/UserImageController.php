<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Input;

class UserImageController extends Controller
{
    public function update(Request $request, User $user)
    {
        $this->authorize('users.image.update', $user);

        $request->validate([
            'image' => ['required', 'file', 'image', 'max:2048'],
        ]);

        if (Input::checkFile('image')) {
            $user->update([
                'image' => Input::storeFile('image', 'public/profiles'),
            ]);
        }

        return redirect()
            ->route('users.show', $user)
            ->with('alert', trans('alerts.profile-img.updated'));
    }
}
