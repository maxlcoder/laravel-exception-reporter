<?php

namespace Maxlcoder\ExceptionReporter\Models;

use Maxlcoder\ExceptionReporter\Contracts\Reporter;

class MongoDBReporter implements Reporter
{
    private $model;
    public function __construct()
    {
        $this->model = new \Mongo();
    }

    public function report($params)
    {
        echo 'mongdDB';
    }

    public function assem()
    {

    }
}