<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'author_id', 'image'];

    function userCanEdit(User $user)
    {
        return $this->author_id == $user->id;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function getCachedCommentsCountAttribute()
    {
        return Cache::remember($this->cacheKey() . ':comments_count', 15, function () {
            return $this->comments->count();
        });
    }
    public function cacheKey()
    {
        return sprintf(
            "%s/%s-%s",
            $this->getTable(),
            $this->getKey(),
            $this->updated_at->timestamp
        );
    }

}
