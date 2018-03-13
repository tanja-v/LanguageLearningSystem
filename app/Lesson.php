<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'lesson_number', 'lesson_name', 'language_id',
    ];

    public function language(){
        return $this->belongsTo('App/Language', 'language_id','id');
    }
}
