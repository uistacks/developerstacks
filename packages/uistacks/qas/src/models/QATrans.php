<?php

namespace UiStacks\Qas\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class QATrans extends Model
{
    protected $table = 'qnas_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    
    public function comments()
	{
		return $this->hasMany('\UiStacks\Qas\Models\QACommentTrans','qna_id','comment_id')->where('lang', Lang::getlocale())->select("*");
	}
    
    public function post()
    {   
        return $this->belongsTo('UiStacks\Qas\Models\QA', 'qna_id');//->select(['id', 'name']);
    
    }

}
