<?php
/**
 * Name: 商品控制器
 * User: 萧俊介
 * Date: 2020/8/31
 * Time: 10:18 上午
 * Created by SANewOrangePHP制作委员会.
 */

namespace App\Http\Controllers;


use App\Exceptions\ProductException;
use App\Http\Requests\Count;
use App\Http\Requests\IDMustBePositiveInt;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /*
     * 获取最新商品
     */
    public function getRecent(Count $request)
    {
        //
        $validated = $request->validated();
        if (empty($validated['count'])) {
            $validated['count'] = 15;
        }
        //
        $products = Product::getMostRecent($validated['count']);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->makeHidden(['summary']);
        return $products;
    }

    /*
     * 获取某分类下的所有商品
     */
    public function getAllInCategory(IDMustBePositiveInt $request)
    {
        //
        $validated = $request->validated();
        //
        $products = Product::getProductsByCategoryID($validated['id']);
        if ($products->isEmpty()) {
            throw new ProductException();
        }
        $products = $products->makeHidden(['summary']);
        return $products;
    }

    /*
     *
     */
    public function getOne(IDMustBePositiveInt $request)
    {
        //
        $validated = $request->validated();
        //
        $product = Product::getProductDetail($validated['id']);
        if (!$product) {
            throw new ProductException();
        } else {
            return $product;
        }
    }

}
