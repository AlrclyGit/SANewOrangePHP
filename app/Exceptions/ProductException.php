<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/8/31
 * Time: 3:19 下午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Exceptions;


class ProductException extends BaseExceptions
{
    public $code = 404;
    public $msg = '自定的商品不存在，请检查参数';
    public $errorCode = 20000;
}
