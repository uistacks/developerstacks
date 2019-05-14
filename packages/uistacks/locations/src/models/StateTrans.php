<?php

namespace Uistacks\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class StateTrans extends Model
{
    protected $table = 'states_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['state_id'];

    protected $casts = [
        'options' => 'array',
    ];

}
