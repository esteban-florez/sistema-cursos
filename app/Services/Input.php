<?php

namespace App\Services;

class Input
{
    public static function getFilters()
    {
        return request()->collect()
            ->filter(function ($_, $paramName) {
                $paramPrefix = explode('|', $paramName)[0];
                return $paramPrefix === 'filters';
            })->filter(function ($paramValue, $_) {
                return $paramValue !== null;
            })->mapWithKeys(function ($paramValue, $paramName) {
                $paramSuffix = explode('|', $paramName)[1];
                return [$paramSuffix => $paramValue];
            })->all();
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