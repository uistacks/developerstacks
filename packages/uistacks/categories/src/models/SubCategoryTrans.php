<?php

namespace Uistacks\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class SubCategoryTrans extends Model
{
    protected $table = 'sub_categories_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['sub_category_id'];
}
