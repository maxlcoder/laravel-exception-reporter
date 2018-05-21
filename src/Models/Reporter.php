<?php

namespace Maxlcoder\ExceptionReporter\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Exception;

class Reporter
{
    public $model;

    public function __construct()
    {
        $this->model = $this->loadModel();
        if (!$this->model) {
            return false;
        }
    }

    public function report(Exception $exception, Request $request)
    {
        return $this->model->report($exception, $request);
    }

    private function loadModel()
    {
        // 检查配置项加载
        $modelType = '\\Maxlcoder\\ExceptionReporter\\Models\\' . ucfirst(Config::get('reporter.connection')) . 'Reporter';
        if (class_exists($modelType)) {
            return new $modelType();
        }
        return false;
    }
}