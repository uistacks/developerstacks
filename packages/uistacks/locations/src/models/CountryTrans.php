<?php

namespace Uistacks\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class CountryTrans extends Model
{
    protected $table = 'countries_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['country_id'];
}
