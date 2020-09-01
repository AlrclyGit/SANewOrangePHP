<?php
/**
 * Name: 商品分类控制器
 * User: 萧俊介
 * Date: 2020/9/1
 * Time: 10:54 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;


use App\Exceptions\CategoryException;
use App\Models\Category;

class CategoryController extends Controller
{
    /*
     * 获取商品分类
     */
    public function getAllCategories()
    {
        $categories = Category::with('img')->get();
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }
}
