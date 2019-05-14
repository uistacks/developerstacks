<?php

namespace Uistacks\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Transaction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';

    /**
     * The hidden data.
     *
     * @var string
     */
    protected $hidden = ['user_id', 'account_id'];

    /**
     * User Relation.
     *
     * 
     */
    public function account()
    {
        return $this->hasOne('Uistacks\Users\Models\Account', 'id', 'account_id');
    }

    /**
     * User Relation.
     *
     * 
     */
    public function user()
    {
        return $this->hasOne('Uistacks\Users\Models\User', 'id', 'user_id');
    }

    /**
     * User Relation.
     *
     * 
     */
    public function author()
    {
        return $this->hasOne('Uistacks\Users\Models\User', 'id', 'created_by')->select(array('id', 'name'));
    }
}
