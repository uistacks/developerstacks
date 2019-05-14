<?php

namespace Uistacks\Faqs\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class FaqTrans extends Model
{
    protected $table = 'faqs_trans';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['faq_id'];
    protected $fillable = ['name', 'description','lang','faq_seo_title','faq_meta_keywords','faq_meta_descriptions'];
}
