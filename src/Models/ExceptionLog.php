<?php
/**
 * Created by PhpStorm.
 * User: liurenlin
 * Date: 2018/5/18
 * Time: 下午6:11
 */

namespace Maxlcoder\ExceptionReporter\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ExceptionLog extends Model
{
    protected $table = '';

    public function __construct()
    {
        $this->table = Config::get('reporter.table');
    }




}