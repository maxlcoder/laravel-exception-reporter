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
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
        // 发布视图
        $this->loadViewsFrom(__DIR__ . '/resources/views');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ExceptionReporter::class, function ($app) {
            return new ExceptionReporter();
        });
    }

    public function provides()
    {
        return [ExceptionReporter::class];
    }
}
