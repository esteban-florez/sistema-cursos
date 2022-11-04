<?php

if(! function_exists('guards')) {
  function guards() {
    return collect(config('auth.guards'))->keys()->all();
  }
}