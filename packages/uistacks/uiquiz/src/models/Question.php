<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Lang;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'topic_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
//    protected $hidden = ['slug', 'options', 'created_by', 'updated_by'];
//
    protected $with = ['trans', 'author', 'lastUpdateBy','topic','options'];

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTopicIdAttribute($input)
    {
        $this->attributes['topic_id'] = $input ? $input : null;
    }

    public function topic()
    {
        return $this->belongsTo('\UiStacks\Uiquiz\Models\Topic', 'topic_id')->withTrashed();
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->select(['id', 'question_id','created_by','active']);
    }

    /**
     * Translation relation.
     *
     * 
     */
    public function trans()
    {
        return $this->hasOne('\UiStacks\Uiquiz\Models\QuestionTrans', 'question_id')->where('lang', Lang::getlocale())->select("*");
//        return $this->hasOne('\UiStacks\Tutorials\Models\QuestionTrans', 'question_id')->select("*");
    }

    /**
     * Get category attribute
     */
    public function getTypeAttribute()
	{	
		if ($this->category == 1) {
			$category = trans('Tutorials::tutorials.tutorials');
		}elseif ($this->category == 2) {
			$category = trans('Tutorials::tutorials.tutorial');
		}
	    return $category;
	}

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
     * Scope a query to only include filterd tutorials name.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function scopeFilterName($query)
    {
        $getName = '';
        if(isset($_GET['name']) && !empty($_GET['name'])){
            $getName = $_GET['name'];
            return $query->whereHas('trans', function($q) use ($getName){
                $q->where('question_text', 'LIKE', '%'.$getName.'%');
            });
        }
    }

    /**
     * Scope a query to only include filterd tutorials question.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilterTopic($query)
    {
        $getTopic = '';
        if(isset($_GET['topic']) && !empty($_GET['topic'])){
            $getTopic = $_GET['topic'];
            return $query->where('topic_id', $getTopic);
        }
    }

    /**
     * Scope a query to only include filterd tutorials status.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
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