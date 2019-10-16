<?php

namespace Hamidrezaniazi\Laramist;

use Illuminate\Support\Facades\Facade;

class LaramistFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laramist';
    }
}
