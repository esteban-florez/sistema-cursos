<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization, AllowsAdmin;
}
