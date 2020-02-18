<?php

namespace App;

use App\Like;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use Commentable;
    
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_posts');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }
}
