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
use App\Exceptions\WeChatException;
use App\Models\User;

class UserTokenService extends TokenService
{

    protected $code;
    protected $wxAppID;
    protected $weAppSecret;
    protected $wxLoginUrl;

    /*
     *
     */
    function __construct($code)
    {
        $wxUrl = "https://api.weixin.qq.com/sns/jscode2session?appid=%s&secret=%s&js_code=%s&grant_type=authorization_cod";
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->weAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf($wxUrl, $this->wxAppID, $this->weAppSecret, $this->code);
    }

    /*
     *
     */
    public function get()
    {
        $result = curlGet($this->wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new WeChatException([
                'msg' => '获取session_key及openID时异常，微信内部错误',
                'data' => $wxResult
            ]);
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                throw new WeChatException([
                    'msg' => 'code可能是无效的',
                    'data' => $wxResult
                ]);
            }
        }
        return $this->grantToken($wxResult);
    }

    /*
     *
     */
    private function grantToken($wxResult)
    {
        $user = User::firstOrCreate(['openid' => $wxResult['openid']]);
        $cachedValue = $this->prepareCachedValue($user->id);
        return $this->saveToCache($cachedValue);
    }

    /*
     *
     */
    private function prepareCachedValue($uid)
    {
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = ScopeEnum::User;
        $cacheValue['expire'] = time();
        return $cacheValue;
    }


}
