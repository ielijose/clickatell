<?php namespace Ielijose\Clickatell\Facades;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Clickatell extends IlluminateFacade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'clickatell'; }


}