<?php
/**
 * Name: 参数错误异常处理
 * User: 萧俊介
 * Date: 2020/8/26
 * Time: 2:46 下午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Exceptions;


class ParameterException extends BaseExceptions
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode = 10000;
}