<?php

namespace App\Rules;

use App\Services\Backup;
use Illuminate\Contracts\Validation\Rule;

class UniqueBackup implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $file)
    {
        $filename = $file->getClientOriginalName();
        return !Backup::exists($filename);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El respaldo subido ya se encuentra en la lista de respaldos.';
    }
}
