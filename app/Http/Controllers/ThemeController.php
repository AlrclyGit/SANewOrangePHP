<?php
/**
 * Name:
 * User: 萧俊介
 * Date: 2020/8/27
 * Time: 1:03 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;



use App\Exceptions\ThemeExceptions;
use App\Http\Requests\IDCollection;
use App\Http\Requests\IDMustBePositiveInt;
use App\Models\Theme;

class ThemeController extends Controller
{

    /*
    * 获取任意组合的专题信息
    * $url /theme?ids=id1,id2,id3
    * @return 一组theme模型
    */
    public function getSimpleList(IDCollection $request)
    {
        //
        $validated = $request->validated();
        $ids = explode(',', $validated['ids']);
        //
        $result = Theme::getThemeByIds($ids);
        //
        if ($result->isEmpty()) {
            throw new ThemeExceptions();
        }
        return $result;
    }

    /*
     * 获取某一专题的商品信息
     * @url /theme:id
     */
    public function getComplexOne(IDMustBePositiveInt $request)
    {
        //
        $validated = $request->validated();
        //
        return Theme::getThemeWithProducts($validated['id']);
    }

}
