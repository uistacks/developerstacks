<?php

namespace UiStacks\Tutorials\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class Tutorial extends Model
{
    protected $table = 'contents';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['category', 'section', 'options', 'created_by', 'updated_by'];
//
    protected $with = ['trans', 'commentedBy'];

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
        return $this->hasOne('\UiStacks\Tutorials\Models\TutorialTrans', 'content_id')->where('lang', Lang::getlocale())->select("*");
    }
    /**
     * Author relation.
     */
    public function commentedBy()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'from_user')->select(['id', 'name']);
    }

    /*
     * get record by name
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

    /*
     * get record by status
     */
    public function scopeFilterCourse($query)
    {
        $getCourse = '';
        if(isset($_GET['course']) && !empty($_GET['course'])){
            $getCourse = $_GET['course'];
            return $query->where('course_id', $getCourse);
        }
    }


    /*
     * get record by status
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