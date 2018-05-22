<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
protected $fillable = [
    'autor', 'title', 'resume', 'content', 'imageurl', 'user_id'
];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }
}
