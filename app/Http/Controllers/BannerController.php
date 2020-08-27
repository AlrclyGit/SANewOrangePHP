<?php
/**
 * Name: Banner控制器
 * User: 萧俊介
 * Date: 2020/8/24
 * Time: 1:26 下午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;

use App\Exceptions\BannerMissException;
use App\Http\Requests\IDMustBePositiveInt;
use App\Models\Banner;

class BannerController extends Controller
{

    /*
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner(IDMustBePositiveInt $request)
    {
        //
        $validated = $request->validated();
        // 通过ID获取Banner
        $banner =  Banner::getBannerByID($validated['id']);
        //
        if($banner->isEmpty()){
            throw new BannerMissException();
        }
        return $banner;
    }

}
