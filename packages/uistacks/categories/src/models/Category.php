<?php

namespace Uistacks\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Category extends Model
{
    protected $table = 'categories';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public $fillable = ['slug','parent_id'];

    protected $hidden = ['options', 'created_by', 'updated_by'];

    protected $with = ['trans', 'author', 'lastUpdateBy', 'parents', 'skills'];
    
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
     */
    public function trans()
    {
        return $this->hasOne('\Uistacks\Categories\Models\CategoryTrans', 'category_id')->where('lang', Lang::getlocale())->select(['id', 'category_id', 'name', 'description']);
    }

    /**
     * Get the parent name for the model.
     * @return string
     */

    public function parents()
    {
        return $this->hasMany('\Uistacks\Categories\Models\Category','id','parent_id') ;
    }

    /**
     * Get the index name for the model.
     * @return string
    */

    public function childs()
    {
        return $this->hasMany('\Uistacks\Categories\Models\Category','parent_id','id') ;
    }

    /**
     * Get the index name for the model.
     * @return string
     */

    public function skills()
    {
        return $this->hasMany('\Uistacks\Skills\Models\Skill','category_id','id')->where('active', true);
    }

	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('Uistacks\Users\Models\User', 'created_by')->select(['id', 'name']);
    }

    /***
     * get all projects
     */
    public function projects()
    {
        return $this->hasMany('\Uistacks\Projects\Models\Project','category_id','id')->where('project_status', 1);
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
     * Scope a query to only include filterd categories name.
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
     * Scope a query to only include filterd categories status.
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

    /**
     * Main image relation.
     */
    public function mainImage()
    {
        $mediaOptions = '';
        $options = $this->options;

        if($options && $options['media'] && isset($options['media']['main_image_id'])){
            $mainImageId = $options['media']['main_image_id'];

            $media = \Uistacks\Media\Models\Media::find($mainImageId);

            if($media){
                $id = $media->id;
                $file = $media->file;
                $styles = $media->options['styles'];
                $mediaOptions = ['id' => $id, 'styles' => $styles, 'file' => $file];

            }
        }
//        return $this->mediaOptions;
        return (object) $mediaOptions;
    }

    /**
     * Get media attribute.
     */
    public function getMediaAttribute()
    {
        return (object) ['main_image' => $this->mainImage()];
    }

}