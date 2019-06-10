<?php

namespace UiStacks\Tutorials\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class CourseTrans extends Model
{
    protected $table = 'courses_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


//    public function contactus()
//	{
//		return $this->hasMany('\UiStacks\Tutorials\Models\TutorialsTrans','contact_section_id','section_id')->where('lang', Lang::getlocale())->select("*");
//	}

//    public function section()
//    {
//        return $this->belongsTo('UiStacks\Tutorials\Models\CommentTrans', 'section_id');
//
//    }

}
