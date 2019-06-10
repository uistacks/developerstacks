<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class QuestionsOptionTrans extends Model
{
    protected $table = 'questions_options_trans';

    protected $fillable = ['option', 'correct'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}
