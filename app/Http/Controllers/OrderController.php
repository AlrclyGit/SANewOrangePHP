<?php
/**
 * Name: 订单控制器
 * User: 萧俊介
 * Date: 2020/9/4
 * Time: 11:41 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;


use App\Exceptions\BaseExceptions;
use App\Http\Requests\IDMustBePositiveInt;
use App\Http\Requests\OrderPlace;
use App\Models\Order;
use App\Service\OrderService;
use App\Service\TokenService;

class OrderController extends Controller
{


    /*
     * 订单记录详情
     */
    public function getDetail(IDMustBePositiveInt $request)
    {
        //
        $validated = $request->validated();
        //
        $orderDetail = Order::find($validated['id']);
        if (!$orderDetail) {
            throw new BaseExceptions([
                'msg' => '订单不存在，请检查ID'
            ]);
        }
        return $orderDetail;
    }

    /*
     * 下单接口
     */
    public function placeOrder(OrderPlace $request)
    {
        //
        $validated = $request->validated();

        //
        $uid = TokenService::getCurrentUid();
        //
        $orderS = new OrderService();
        $status = $orderS->place($uid, $validated['products']);
        return saReturn($status);
    }
}
