<?php

namespace Uistacks\Blogs\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class CommentTrans extends Model
{
    protected $table = 'comments_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    
    
    public function contactus()
	{
		return $this->hasMany('\Uistacks\Blogs\Models\BlogsTrans','contact_section_id','section_id')->where('lang', Lang::getlocale())->select("*");
	}
    
    public function section()
    {   
        return $this->belongsTo('Uistacks\Blogs\Models\CommentTrans', 'section_id');
    
    }

}
