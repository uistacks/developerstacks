<?php

namespace Uistacks\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class CategoryTrans extends Model
{
    protected $table = 'categories_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['category_id'];
}
