<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    //
    protected $fillable =['openid'];

    /*
     * 关联用户的收货地址表
     */
    public function address()
    {
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }
}
