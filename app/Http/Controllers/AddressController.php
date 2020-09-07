<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/9/4
 * Time: 10:17 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;


use App\Http\Requests\AddressNew;
use App\Models\User;
use App\Service\TokenService;


class AddressController extends Controller
{
    /*
     * 更新或者添加用户收货地址
     */
    public function createOrUpdateAddress(AddressNew $request)
    {
        // 参数合理性验证
        $validated = $request->validated();
        // 获取当前用户UID
        $uid = TokenService::getCurrentUid();
        // 从 User 表获取用户
        $user = User::find($uid);
        // 获取关联地址自动入库
        $user->address()->updateOrCreate([],$validated);
        // 返回成功消息
        return saReturn();
    }
}
