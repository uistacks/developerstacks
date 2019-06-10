<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class AnswerTrans extends Model
{
    protected $table = 'answers_trans';
    protected $fillable = ['option_id', 'correct'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}
