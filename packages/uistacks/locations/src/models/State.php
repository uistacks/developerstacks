<?php

namespace Uistacks\Locations\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class State extends Model
{
    protected $table = 'states';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['options', 'created_by', 'updated_by','country_id'];

    protected $with = ['trans', 'country', 'author', 'lastUpdateBy'];

    /**
     * Translation relation.
     *
     * 
     */

    public function trans()
    {
        return $this->hasOne('\Uistacks\Locations\Models\StateTrans', 'state_id')->where('lang', Lang::getlocale());
    }

    /**
     * Country relation.
     */
    public function country()
    {
        return $this->belongsTo('Uistacks\Locations\Models\Country', 'country_id')->select(['id']);
    }

	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'created_by')->select(['id', 'name']);
    }

	/**
     * lastUpdateBy relation.
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'updated_by')->select(['id', 'name']);
    }


    /**
     * Scope a query to only include filterd states name.
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
     * Scope a query to only include filterd states status.
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

    /*
     * frontend filters
     */
    //state name
    public function scopeStateName($query)
    {
        $getName = '';
        if(isset($_GET['state_name']) && !empty($_GET['state_name'])){
            $getName = $_GET['state_name'];
            return $query->whereHas('trans', function($q) use ($getName){
//                $q->where('name', $getName);
                $q->where('state_id', $getName);
            });
        }
    }
    //state country name
    public function scopeCategoryName($query)
    {
        $getStatus = '';
        if(isset($_GET['category']) && !empty($_GET['category'])){
            $getStatus = $_GET['category'];
            return $query->where('category_id', $getStatus);
        }
    }
    //state country name
    public function scopeCountryName($query)
    {
        $getName = '';
        if(isset($_GET['country']) && !empty($_GET['country'])){
            $getName = $_GET['country'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('country', $getName);
            });
        }
    }
    //state country name
    public function scopeCityName($query)
    {
        $getName = '';
        if(isset($_GET['area']) && !empty($_GET['area'])){
            $getName = $_GET['area'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('area', $getName);
            });
        }
    }
}