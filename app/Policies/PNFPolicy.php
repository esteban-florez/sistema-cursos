<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PNFPolicy
{
    use HandlesAuthorization, AllowsAdmin;
}
