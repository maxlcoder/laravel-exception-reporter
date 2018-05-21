<?php

namespace Maxlcoder\ExceptionReporter\Contracts;

use Exception;
use Illuminate\Http\Request;

interface Reporter
{
    public function report(Exception $exception, Request $request);
}