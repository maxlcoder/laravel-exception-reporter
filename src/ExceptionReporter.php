<?php

namespace Maxlcoder\ExceptionReporter;

use Maxlcoder\ExceptionReporter\Models\MongoDBReporter;
use Maxlcoder\ExceptionReporter\Models\Reporter;

class ExceptionReporter
{
    public $reporter;
    public function __construct()
    {
        $this->reporter = new Reporter();
    }



    /**
     * 记录错误报告
     */
    public function report()
    {
        $this->reporter->report(request());
    }

    /**
     * 通知
     */
    private function notify()
    {

    }
}