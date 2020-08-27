<?php
/**
 * Name: 请求的Banner不存在
 * User: 萧俊介
 * Date: 2020/8/26
 * Time: 12:11 下午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Exceptions;


class BannerMissException extends BaseExceptions
{
    public $code = 404;
    public $msg = '请求的Banner不存在';
    public $errorCode = 40000;
}