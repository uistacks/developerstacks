<?php

namespace Uistacks\Faqs\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Faq extends Model
{
    protected $table = 'faqs';

//    protected $appends = ['type', 'media'];
    protected $fillable = ['faq_type', 'faq_url','published'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['category', 'section', 'options', 'created_by', 'updated_by'];
//
//    protected $with = ['trans', 'author', 'lastUpdateBy', 'itemSection'];
    
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
//        return $this->hasOne('\Uistacks\Faqs\Models\FaqTrans', 'faq_id')->where('lang', Lang::getlocale())->select(['faq_id', 'title', 'body','lang','faq_seo_title','faq_meta_keywords','faq_meta_descriptions']);
        return $this->hasOne('\Uistacks\Faqs\Models\FaqTrans', 'faq_id')->where('lang', Lang::getlocale());
    }

    /**
     * Get category attribute
     */
    public function getTypeAttribute()
	{	
		if ($this->category == 1) {
			$category = trans('Faqs::ads.ads');
		}elseif ($this->category == 2) {
			$category = trans('Faqs::ads.services');
		}
	    return $category;
	}

	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('uistacks\Users\Models\User', 'created_by')->select(['id', 'name']);
    }

	/**
     * Author relation.
     */
    public function itemSection()
    {
        return $this->belongsTo('uistacks\Faqs\Models\Section', 'section');
    }

    /**
     * Get author attribute
     */
    public function getlastUpdateByAttribute()
	{
	    return $this->lastUpdateBy();
	}

	/**
     * lastUpdateBy relation.
     */
    public function lastUpdateBy()
    {
        return $this->belongsTo('uistacks\Users\Models\User', 'updated_by')->select(['id', 'name']);
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



    /**
     * Scope a query to only include filterd ads name.
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
     * Scope a query to only include filterd ads section.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterCategory($query)
    {
        $getCategory = '';
        if(isset($_GET['category']) && !empty($_GET['category'])){
            $getCategory = $_GET['category'];
            return $query->where('category', $getCategory);
        }
    }

    /**
     * Scope a query to only include filterd ads section.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterSection($query)
    {
        $getSection = '';
        if(isset($_GET['section']) && !empty($_GET['section'])){
            $getSection = $_GET['section'];
            return $query->where('section', $getSection);
        }
    }

    /**
     * Scope a query to only include filterd ads status.
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