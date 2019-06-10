<?php

namespace UiStacks\Tutorials\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Section extends Model
{
    protected $table = 'sections';

//    protected $appends = ['type', 'media'];
    protected $fillable = ['name','body'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
//
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
        return $this->hasOne('\UiStacks\Tutorials\Models\SectionTrans', 'section_id')->where('lang', Lang::getlocale())->select("*");
//        return $this->hasOne('\UiStacks\Tutorials\Models\SectionTrans', 'section_id')->select("*");
    }

    /**
     * Get category attribute
     */
    public function getTypeAttribute()
	{	
		if ($this->category == 1) {
			$category = trans('Tutorials::tutorials.tutorials');
		}elseif ($this->category == 2) {
			$category = trans('Tutorials::tutorials.tutorial');
		}
	    return $category;
	}

	/**
     * Author relation.
     */
    public function author()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'created_by')->select(['id', 'name']);
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
        return $this->belongsTo('UiStacks\Users\Models\User', 'updated_by')->select(['id', 'name']);
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
	    	$media = \UiStacks\Media\Models\Media::find($mainImageId);
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
     * Scope a query to only include filterd tutorials name.
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
     * Scope a query to only include filterd tutorials section.
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
     * Scope a query to only include filterd tutorials status.
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