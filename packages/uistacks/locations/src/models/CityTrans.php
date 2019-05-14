<?php

namespace Uistacks\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class CityTrans extends Model
{
    protected $table = 'cities_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['city_id'];
}
