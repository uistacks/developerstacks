<?php

namespace Uistacks\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Country extends Model
{
    protected $table = 'countries';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['options', 'created_by', 'updated_by'];

    protected $with = ['trans', 'author', 'lastUpdateBy'];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Translation relation.
     *
     * 
     */
    public function trans()
    {
//        return $this->hasOne('\Uistacks\Locations\Models\CountryTrans', 'country_id')->where('lang', Lang::getlocale())->select(['country_id', 'name']);
        return $this->hasOne('\Uistacks\Locations\Models\CountryTrans', 'country_id')->where('lang', Lang::getlocale())->select('*')->orderBy('name','ASC');
    }
    /**
     * State relation.*
     */
//    public function state()
//    {
//        return $this->hasOne('\Uistacks\Locations\Models\State', 'country_id')->where('lang', Lang::getlocale())->select('*')->orderBy('id');
//    }
	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'created_by')->select(['id', 'name']);
    }

    /**
     * Get author attribute
     */
 //    public function getlastUpdateByAttribute()
	// {
	//     return $this->lastUpdateBy();
	// }

	/**
     * lastUpdateBy relation.
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'updated_by')->select(['id', 'name']);
    }


    /**
     * Scope a query to only include filterd countries name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterName($query)
    {
        $getName = '';
        if(isset($_GET['name']) && !empty($_GET['name'])){
            $getName = $_GET['name'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('name', 'LIKE', '%'.$getName.'%');
            });
        }
    }

    /**
     * Scope a query to only include filterd countries status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterStatus($query)
    {
        $getStatus = '';
        //dd($_GET['status']);
        if(isset($_GET['status']) && !empty($_GET['status'])){
            $getStatus = $_GET['status'];
            if($getStatus == 2){
                $getStatus = false;
            }
            return $query->where('active', $getStatus);
        }
    }
}