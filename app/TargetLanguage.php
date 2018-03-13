<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TargetLanguage extends Model
{
    protected $fillable = [
        'user_id', 'language_id',
    ];

    public function user(){
        return $this->belongsTo('App/User', 'user_id','id');
    }

    public function language(){
        return $this->belongsTo('App/Language', 'language_id','id');
    }
}
