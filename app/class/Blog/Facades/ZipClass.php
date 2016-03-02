<?php

namespace Blog\Facades;

use Illuminate\Support\Facades\Facade;

class  ZipClass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'zip';
    }
}