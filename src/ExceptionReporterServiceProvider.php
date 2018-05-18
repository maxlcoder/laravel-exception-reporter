<?php

namespace Maxlcoder\ExceptionReporter;

use Illuminate\Support\ServiceProvider;

class ExceptionReporterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布配置
        $this->publishes([
            __DIR__ . '/config/reporter.php' => config_path('reporter.php'),
        ]);
        // 发布错误日志记录表
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        // 发布视图
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'exception-reporter');
        // 发布路由
        $this->loadRoutesFrom(__DIR__ . '/../routes/reporter.php');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('exceptionReporter', function ($app) {
            return new ExceptionReporter();
        });
    }

    public function provides()
    {
        return [ExceptionReporter::class];
    }
}
