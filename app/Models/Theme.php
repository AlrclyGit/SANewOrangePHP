<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    // 隐藏字段
    protected $hidden = ['topic_img_id', 'head_img_id', 'created_at', 'updated_at', 'deleted_at'];

    /*
     *
     */
    static function getThemeByIds($ids)
    {
        return self::with(['topicImg', 'headImg'])
            ->whereIn('id', $ids)
            ->get();
    }

    /*
     *
     */
    public function topicImg()
    {
        return $this->belongsTo(Image::class, 'topic_img_id', 'id');
    }

    /*
     *
     */
    public function headImg()
    {
        return $this->belongsTo(Image::class, 'head_img_id', 'id');
    }
}
