<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'author', 'post_body'
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

}
