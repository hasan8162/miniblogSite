<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function authorBlogs($authorId, $type="Latest")
    {
        
        if($type == "Latest"){
            $posts = Post::where('user_id', $authorId)->where('show', 'Public')
            ->orderBy('created_at', 'DESC')->get();
        }
        else if($type == "Oldest"){
            $posts = Post::where('user_id', $authorId)->where('show', 'Public')->get();
        }
        
        else if($type == "Popular"){
            $posts = Post::where('user_id', $authorId)->where('show', 'Public')
            ->orderBy('votes', 'DESC')->orderBy('created_at', 'DESC')->get();
        }

        $current_user = Auth::user()->id;
        return view('authorblogs', ['posts' => $posts, 'current_user' => $current_user, 'authorId' => $authorId, 'type' => $type]);
    }

}