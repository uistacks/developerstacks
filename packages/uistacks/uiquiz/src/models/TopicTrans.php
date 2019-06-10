<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class TopicTrans extends Model
{
    protected $table = 'topics_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


//    public function contactus()
//	{
//		return $this->hasMany('\UiStacks\Uiquiz\Models\UiquizTrans','contact_section_id','section_id')->where('lang', Lang::getlocale())->select("*");
//	}

//    public function section()
//    {
//        return $this->belongsTo('UiStacks\Uiquiz\Models\CommentTrans', 'section_id');
//
//    }

}
