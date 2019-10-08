<?php

namespace Hamidrezaniazi\Laramist;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hamidrezaniazi\Laramist\Skeleton\SkeletonClass
 */
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
