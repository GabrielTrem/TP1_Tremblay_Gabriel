<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'title',
        'release_year',
        'length',
        'description',
        'rating',
        'language_id',
        'special_features',
        'image'
    ];

    public function language(){
        return $this->belongsTo('App\Models\Language');
    }

    public function critics(){
        return $this->hasMany('App\Models\Critic');
    }
}
