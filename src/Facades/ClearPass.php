<?php

namespace spkm\ClearPass\Facades;

use Illuminate\Support\Facades\Facade;

class ClearPass extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'clearpass';
    }
}
