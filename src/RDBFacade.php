<?php

namespace RonAppleton\RDB;

use Illuminate\Support\Facades\Facade;
/**
 * @see \Collective\Html\HtmlBuilder
 */
class RDBFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rdb';
    }
}