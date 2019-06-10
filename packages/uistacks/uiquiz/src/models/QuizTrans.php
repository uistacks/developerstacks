<?php

namespace UiStacks\Uiquiz\Models;

use Illuminate\Database\Eloquent\Model;
use Lang;

class QuizTrans extends Model
{
    protected $table = 'quizes_trans';
    protected $fillable = ['result'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

}
