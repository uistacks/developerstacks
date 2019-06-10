<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Lang;

class Topic extends Model
{
    use SoftDeletes;

    protected $table = 'topics';

    protected $fillable = ['title'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
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
     */
    public function trans()
    {
        return $this->hasOne('\UiStacks\Uiquiz\Models\TopicTrans', 'topic_id')->where('lang', Lang::getlocale())->select("*");
    }
    /**
     * Question relation.
     */
    public function questions()
    {
        return $this->hasMany(Question::class, 'topic_id')->withTrashed();
    }
    /**
     * Author relation.
     */
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
    /*
     * page status filter
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