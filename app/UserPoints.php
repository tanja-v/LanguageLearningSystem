<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPoints extends Model
{
    protected $fillable = [
        'word_id', 'user_id', 'points',
    ];

    public function word(){
        return $this->belongsTo('App/Word', 'word_id','id');
    }

    public function user(){
        return $this->belongsTo('App/User', 'user_id','id');
    }
}
