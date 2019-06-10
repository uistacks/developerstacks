<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Lang;

class Quiz extends Model
{
    use SoftDeletes;

    protected $table = 'quizes';

    protected $fillable = ['user_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
//
    protected $with = ['trans'];
    /**
     * Translation relation.
     */
    public function trans()
    {
        return $this->hasOne('\UiStacks\Uiquiz\Models\QuizTrans', 'quize_id')->where('lang', Lang::getlocale())->select("*");
    }

    public function user()
    {
        return $this->belongsTo('UiStacks\Users\Models\User', 'user_id')->select(['id', 'name']);
    }

}