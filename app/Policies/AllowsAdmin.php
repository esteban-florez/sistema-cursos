<?php

namespace App\Policies;

use App\Models\User;

trait AllowsAdmin
{
    public function before(User $user)
    {
        if ($user->can('role', 'Administrador')) {
            return true;
        }
    }

    public function viewAny() {}

    public function view() {}

    public function create() {}

    public function update() {}

    public function delete() {}

    public function restore() {}

    public function forceDelete() {}
}
