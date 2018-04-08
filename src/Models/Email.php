<?php

namespace Maxlcoder\ExceptionReporter\Models;

use Illuminate\Support\Facades\Mail;

class Email
{
    private $to = [];
    private $cc = [];

    public function __construct()
    {
        // 初始化邮件发送类

    }

    public function send($sn)
    {
    }
}