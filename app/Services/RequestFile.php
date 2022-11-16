<?php

namespace App\Services;

use Illuminate\Http\Request;

class RequestFile 
{
  public static function check($field)
  {
    return request()->hasFile($field) && request()->file($field)->isValid();
  }

  public static function store($field, $path) {
    $filePath = request()->file($field)->store($path);
    $pathArray = explode('/', $filePath);
    $pathArray[0] = 'storage';
    return implode('/', $pathArray);
  }
}
