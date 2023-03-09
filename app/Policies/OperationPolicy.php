<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class OperationPolicy
{
    use HandlesAuthorization, AllowsAdmin;
}
