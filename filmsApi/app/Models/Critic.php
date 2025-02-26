<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Critic extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'film_id',
        'score',
        'comment'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function film(){
        return $this->belongsTo('App\Models\Film');
    }
}
