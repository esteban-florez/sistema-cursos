<?php

namespace App\Services;

class Input
{
    public static function getFilters()
    {
        return request()->collect()
            ->filter(fn($_, $paramName) => explode('|', $paramName)[0] === 'filters')->filter(fn($paramValue) => $paramValue !== null)
            ->mapWithKeys(fn($paramValue, $paramName) =>
                [explode('|', $paramName)[1] => $paramValue])
            ->all();
    }

    public static function checkFile($field)
    {
        return request()->hasFile($field) && request()->file($field)->isValid();
    }

    public static function storeFile($field, $path)
    {
        $filePath = request()->file($field)->store($path);
        $pathArray = explode('/', $filePath);
        $pathArray[0] = 'storage';
        return implode('/', $pathArray);
    }
}