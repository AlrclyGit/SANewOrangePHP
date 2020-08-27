<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/8/27
 * Time: 10:29 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Exceptions;


class ThemeExceptions extends BaseExceptions
{
    public $code = 404;
    public $msg = '指定主题不存在，请检查主题ID';
    public $errorCode = 30000;
}
