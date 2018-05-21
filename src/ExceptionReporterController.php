<?php

namespace Maxlcoder\ExceptionReporter;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maxlcoder\ExceptionReporter\Models\ExceptionLog;

class ExceptionReporterController extends Controller
{
    public function show($sn)
    {
        $erroLog = json_decode(ExceptionLog::where('sn', $sn)->orderBy('created_at', 'desc')->value('content'), true);
        return view('exception-reporter::index', [
            'errorLog' => $erroLog,
        ]);
    }
}