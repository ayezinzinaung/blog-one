<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Model\user\tag','post_tag');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Model\user\category','category_posts');
    }
}
