<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Critic extends Model
{
    protected $fillable = [
        'user_id',
        'film_id',
        'score',
        'comment'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
