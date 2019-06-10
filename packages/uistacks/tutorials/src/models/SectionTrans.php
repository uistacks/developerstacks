<?php

namespace UiStacks\Tutorials\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class SectionTrans extends Model
{
    protected $table = 'sections_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    
    public function comments()
	{
		return $this->hasMany('\UiStacks\Tutorials\Models\CommentTrans','post_id','comment_id')->where('lang', Lang::getlocale())->select("*");
	}
    
    public function post()
    {   
        return $this->belongsTo('UiStacks\Tutorials\Models\Tutorials', 'post_id');//->select(['id', 'name']);
    
    }

}
