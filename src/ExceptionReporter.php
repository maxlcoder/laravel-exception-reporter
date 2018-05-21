<?php

namespace Maxlcoder\ExceptionReporter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maxlcoder\ExceptionReporter\Models\Reporter;
use Exception;

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
    public function report(Exception $exception, Request $request)
    {
        try {
            $this->reporter->report($exception, $request);
            return true;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }

    }
}