<?php

namespace Maxlcoder\ExceptionReporter\Models;

use Illuminate\Support\Facades\Config;

class Reporter
{
    public $model;

    public function __construct()
    {
        $this->model = $this->loadModel();
    }

    public function report()
    {
        return $this->model->report([]);
    }

    private function loadModel()
    {
        // 检查配置项加载
        $modelType = '\\Maxlcoder\\ExceptionReporter\\Models\\' . Config::get('reporter.driver') . 'Reporter';
        return new $modelType();
    }
}