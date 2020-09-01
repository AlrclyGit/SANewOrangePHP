<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    //
    protected $hidden = ['id','product_id','created_at', 'updated_at', 'deleted_at'];
}
