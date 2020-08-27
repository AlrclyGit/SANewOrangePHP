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
}
