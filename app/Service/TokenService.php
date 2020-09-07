<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/9/1
 * Time: 11:18 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Service;


use App\Enums\ScopeEnum;
use App\Exceptions\ForbiddenException;
use App\Exceptions\TokenException;
use Illuminate\Support\Facades\Request;

class TokenService
{

    /*
     *
     */
    protected function saveToCache($cacheValue)
    {
        //
        $value = json_encode($cacheValue);
        $signature = self::getSignature($value);
        return implode('.', [$value, $signature]);
    }

    /*
     * 获取用户某个Value
     */
    static public function getCurrentToKenVar($key)
    {
        //
        $token = Request::header('token');
        if (empty($token)) {
            throw new TokenException();
        }
        //
        $tokenArray = explode('.', $token);
        $value = $tokenArray[0];
        $signature = $tokenArray[1];
        //
        $localSignature = self::getSignature($value);
        if ($localSignature !== $signature) {
            throw new TokenException();
        }
        if (!is_array($value)) {
            $value = json_decode($value, true);
        }
        if (!array_key_exists($key, $value)) {
            throw new TokenException([
                'msg' => '尝试获取的Token变量不存在'
            ]);
        }
        return $value[$key];
    }

    /*
     * 生成签名的方法
     */
    static private function getSignature($value)
    {
        return md5(md5($value) . config('setting.token_salt'));
    }

    /*
     * 获取用户Uid
     */
    static public function getCurrentUid()
    {
        $uid = self::getCurrentToKenVar('uid');
        return $uid;
    }

    /*
     * 检测传入的UID是否为当前用户
     */
    static public function isValidOperate($checkedUID)
    {
        if (!$checkedUID) {
            throw new TokenException('检测UID时必须传入一个被检测的UID');
        }
        $currentOperateUID = self::getCurrentUid();
        if ($currentOperateUID == $checkedUID) {
            return true;
        }
        return false;
    }

    /*
     * 权限验证方法（用户）
     */
    public static function needExclusiveScope()
    {
        $scope = self::getCurrentToKenVar('scope');
        if ($scope) {
            if ($scope == ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }

    /*
     * 权限验证方法（管理员和用户）
     */
    public static function needPrimaryScope()
    {
        $scope = self::getCurrentToKenVar('scope');
        if ($scope) {
            if ($scope >= ScopeEnum::User) {
                return true;
            } else {
                throw new ForbiddenException();
            }
        } else {
            throw new TokenException();
        }
    }

}
