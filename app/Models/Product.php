<?php

namespace App\Models;

class Product extends BaseModel
{
    // 隐藏字段
    protected $hidden = ['topic_img_id', 'head_img_id', 'main_img_id', 'pivot', 'from', 'category_id', 'created_at', 'updated_at', 'deleted_at'];

    /*
     * url访问器
     */
    public function getMainImgUrlAttribute($url)
    {
        return $this->prefixImgUrl($url, $this->from);
    }

    /*
     *
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id')
            ->orderBy('order', 'asc');
    }

    /*
     *
     */
    public function properties()
    {
        return $this->hasMany(ProductProperty::class, 'product_id', 'id');
    }


    /*
     *
     */
    public static function getMostRecent($count)
    {
        return self::orderBy('created_at', 'desc')
            ->limit($count)
            ->get();
    }

    /*
     *
     */
    public static function getProductsByCategoryID($categoryID)
    {
        return self::where('category_id', $categoryID)
            ->get();
    }

    /*
 *
 */
    public static function getProductDetail($id)
    {
        return self::with(['images.img','properties'])->find($id);
    }
}
