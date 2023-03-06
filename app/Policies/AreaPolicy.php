<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class AreaPolicy
{
    use HandlesAuthorization, AllowsAdmin;
}
