<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Models\User\Tag','post_tags')->withTimestamp();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\User\Category','category_posts')->withTimestamp();
    }
}
