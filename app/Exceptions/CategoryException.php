<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/9/1
 * Time: 10:55 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Exceptions;


class CategoryException extends BaseExceptions
{
    public $code = 404;
    public $msg = '后台未设置任何的类目';
    public $errorCode = 50000;
}
