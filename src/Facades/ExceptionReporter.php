<?php

namespace Maxlcoder\ExceptionReporter\Facades;

use Illuminate\Support\Facades\Facade;

class ExceptionReporter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ExceptionReporter';
    }
}