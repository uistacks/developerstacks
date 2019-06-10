<?php

namespace UiStacks\Qas\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class QAComment extends Model
{
    protected $table = 'qnas_comments';

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
        return $this->hasOne('\UiStacks\Qas\Models\QACommentTrans', 'qna_comment_id')->where('lang', Lang::getlocale())->select("*");
    }
    /**
     * Author relation.
     */
    public function commentedBy()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'from_user')->select(['id', 'name']);
    }

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