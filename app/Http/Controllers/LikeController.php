<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        $user_id = Auth::user()->id;

        $allLikers = [];
            foreach ($post->likes as $like) {
                $allLikers[] = $like->liker_id;
            }

        if (!in_array($user_id, $allLikers)) {
            $post->likes()->create([
            'liker_id' => $user_id
        ]);       
            return redirect()->back();
        }
        else {
            $post->likes()->where('liker_id', $user_id)->delete();
            return redirect()->back();
        }
    
    }

}
