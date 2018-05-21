<?php
namespace Maxlcoder\ExceptionReporter\Models;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Maxlcoder\ExceptionReporter\Contracts\Reporter;
use Exception;

class MysqlReporter implements Reporter
{
    private $exceptionTable;
    private $interval;
    private $sleep;
    private $event;

    public function __construct()
    {
        $this->exceptionTable = Config::get('reporter.table');
        $this->interval = !empty(Config::get('reporter.interval')) ? Config::get('reporter.interval') : 0;
        $this->sleep = Config::get('reporter.sleep');
        $this->event = '\\App\\Events\\' . Config::get('reporter.event');
    }

    public function report(Exception $exception, Request $request)
    {
        if ($this->sleep['deep'] == 2) {
            return true;
        }
        //  错误json封装
        $exceptionJson = self::combineError($exception, $request);
        $sn = md5(implode('-', [
            $exception->getFile(),
            $exception->getLine(),
            $exception->getMessage(),
            $exception->getCode(),
        ]));
        // 检查频率
        $latestException = $this->getExceptionLog($sn);

        if ($latestException) {
            $createdAt = Carbon::parse($latestException->created_at)->timestamp;
            if ($createdAt > (time() - $this->interval)) {
                return true;
            }
        }
        // 入库
        $this->saveExceptionLog([
            'sn' => $sn,
            'content' => $exceptionJson,
        ]);
        if ($this->sleep['deep'] == 1) {
            return true;
        }
        // 通知
        if (class_exists($this->event)) {
            event(new $this->event());
        }
        return true;
    }

    private function combineError(Exception $exception, Request $request)
    {
        return json_encode([
            'headers' => $request->header(),
            'ip' => $request->getClientIp(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'inputs' => $request->input(),
            'queries' => $request->query(),
            'sessions' => $request->session()->all(),
            'cookies' => $request->cookie(),
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'previous' => $exception->getPrevious(),
        ]);
    }

    private function getExceptionLog($sn)
    {
        return ExceptionLog::where('sn', $sn)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    private function saveExceptionLog($data)
    {
        return (new ExceptionLog())->setRawAttributes($data)->save();
    }
}