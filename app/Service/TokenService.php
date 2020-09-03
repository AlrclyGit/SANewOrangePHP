<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/9/1
 * Time: 11:18 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Service;


class TokenService
{
    /*
     * 获取一个随机的Token的Key
     */
    public static function generateToken()
    {
        $randChars = getRandChar(32);
        $timestamp = time();
        $salt = config('secure.token_salt');
        return md5($randChars . $timestamp . $salt);
    }
}
