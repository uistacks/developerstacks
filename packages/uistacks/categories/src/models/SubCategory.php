<?php

namespace Uistacks\Categories\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['options', 'created_by', 'updated_by'];

    protected $with = ['parent','trans', 'author', 'lastUpdateBy'];
    
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
    public function parent()
    {
        return $this->hasOne('\Uistacks\Categories\Models\Category', 'id','category_id')->select(['id']);
    }
    /**
     * Translation relation.
     */
    public function trans()
    {
        return $this->hasOne('\Uistacks\Categories\Models\SubCategoryTrans', 'sub_category_id')->where('lang', Lang::getlocale())->select(['sub_category_id', 'name','description']);
    }

//    public function menuLocation()
//    {
//        return $this->hasOne('\Uistacks\Menulocations\Models\Menulocation', 'product_id','id')->where('product_type', 's')->where('product_id', '!=', 0)->select(['product_id', 'location_id','price']);
//    }
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
                $styles = $media->options['styles'];
                $mediaOptions = ['id' => $id, 'styles' => $styles];
            }
        }

        return (object) $mediaOptions;
    }

    /**
     * Gallery relation.
     */
    public function gallery()
    {
        $mediaOptions = [];
        $options = $this->options;

        if($options && $options['media'] && isset($options['media']['gallery_images'])){
            $galleryImagesIds = $options['media']['gallery_images'];
            $media = \App\Media::whereIn('id', $galleryImagesIds)->get();

            if($media){
                foreach ($media as $image) {
                    $id = $image->id;
                    $styles = $image->options['styles'];
                    $mediaOptions[] = ['id' => $id, 'styles' => $styles];
                }
            }
        }
        return (object) $mediaOptions;
    }

    /**
     * Get media attribute.
     */
    public function getMediaAttribute()
    {
        return (object) ['main_image' => $this->mainImage(), 'gallery' => $this->gallery()];
    }

}