<?php

namespace App\Services;

class QueryString
{
    public static function filters()
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
}