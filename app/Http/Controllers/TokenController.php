<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/9/1
 * Time: 11:11 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;


use App\Http\Requests\TokenGet;
use App\Service\UserTokenService;

class TokenController extends Controller
{

    /*
     *
     */
    public function getToken(TokenGet $request)
    {
        //
        $validated = $request->validated();
        //
        $userTokenS = new UserTokenService($validated['code']);
        $token = $userTokenS->get();
        //
        return saReturn($token);
    }
}
