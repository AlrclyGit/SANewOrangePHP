<?php
/**
 * Name: 验证失败的处理方法
 * User: 萧俊介
 * Date: 2020/8/26
 * Time: 2:37 下午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Requests;


use App\Exceptions\ParameterException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequests extends FormRequest
{

    protected $routeData = [];

    /*
     * 验证失败的处理方法
     */
    public function failedValidation(Validator $validator)
    {
        throw new ParameterException([
            'msg' => $validator->errors()->first()
        ]);
    }

    /**
     * 设置要处理的数据,追加路由参数
     */
    public function validationData()
    {
        $allData = $this->all();
        foreach ($this->routeData as $value) {
            $allData[$value] = $this->route($value);
        }
        return $allData;
    }

}
