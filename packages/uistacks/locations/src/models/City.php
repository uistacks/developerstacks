<?php

namespace Uistacks\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class City extends Model
{
    protected $table = 'cities';

    //protected $appends = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['created_by', 'updated_by'];

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
        return $this->hasOne('\Uistacks\Locations\Models\CityTrans', 'city_id')->where('lang', Lang::getlocale())->select(['city_id', 'name']);
    }


	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'created_by')->select(['id', 'name']);
    }

    /**
     * Country relation.
     */
    public function country()
    {
        return $this->belongsTo('\Uistacks\Locations\Models\Country', 'country_id');
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
     * Scope a query to only include filterd countries name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterCountry($query)
    {
        if(isset($_GET['country']) && !empty($_GET['country'])){
            return $query->where('country_id', $_GET['country']);
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