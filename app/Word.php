<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'word', 'eng_translation', 'language_id', 'lesson_id',
    ];

    public function language(){
        return $this->belongsTo('App/Language', 'language_id','id');
    }

    public function lesson(){
        return $this->belongsTo('App/Lesson', 'lesson_id','id');
    }
}
