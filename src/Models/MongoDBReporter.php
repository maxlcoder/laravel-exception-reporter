<?php

namespace Maxlcoder\ExceptionReporter\Models;

use Maxlcoder\ExceptionReporter\Contracts\Reporter;

class MongoDBReporter implements Reporter
{
    public function __construct()
    {
        // 组装
    }

    public function report($params)
    {
        echo 'mongdDB';
    }

    public function assem()
    {

    }
}