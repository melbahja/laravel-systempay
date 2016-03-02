<?php

namespace Restoore\Systempay;

use Illuminate\Support\Facades\Facade;

class SystempayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'restoore-systempay';
    }
}