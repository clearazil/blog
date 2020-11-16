<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function contentArray()
    {
        return explode(PHP_EOL, $this->content);
    }

    public function firstLine()
    {
        $postArray = $this->contentArray();

        return reset($postArray);
    }

    public function contentArrayWithoutFirstLine()
    {
        $postArray = $this->contentArray();

        // remove the first array element
        reset($postArray);

        // remove the next one as well if it contains a line break
        if (empty(current($postArray))) {
            reset($postArray);
        }

        return $postArray;
    }
}
