<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $hidden = ['id', 'create_time', 'update_time', 'delete_time'];
    protected $fillable =['name','mobile','province','city','country','detail'];
}
