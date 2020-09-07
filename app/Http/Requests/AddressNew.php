<?php
/**
 * Name: 验证地址填写
 * User: 萧俊介
 * Date: 2020/9/4
 * Time: 10:19 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Requests;


use App\Rules\IsMobile;

class AddressNew extends BaseRequests
{
    /**
     * 权限判断
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 过滤规则
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'mobile' => ['required',new IsMobile()],
            'province' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
            'detail' => ['required'],
        ];
    }

    /**
     * 错误消息
     */
    public function messages()
    {
        return [
            'name.required' => 'name参数为必选',
            'mobile.required' => 'mobile参数为选',
            'province.required' => 'province参数为必选',
            'city.required' => 'city参数为必选',
            'country.required' => 'country参数为必选',
            'detail.required' => 'detail参数为必选',
        ];
    }
}
