<?php

namespace enesyurtlu\ModMan\Facades;

use Illuminate\Support\Facades\Facade;

class ModManFacade extends Facade
{
    /**
     * @method static bool isExist()
     *
     * @see \enesyurtlu\ModMan\ModMan
     */
    protected static function getFacadeAccessor()
    {
        return 'modman';
    }
}
