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
        $user = Auth::user();
     
        if (!$user->isLiker($post)) {
            $post->likes()->create([
            'liker_id' => $user->id
        ]);       
            return redirect()->back();
        }
        else {
            $post->likes()->where('liker_id', $user->id)->delete();
            return redirect()->back();
        }
    
    }

}
