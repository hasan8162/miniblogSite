<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function upvote($id, $where, $type){
        
        //$post = POST::find($id);
        $post = Post::where('id', $id)->first();
        $current_user = Auth::user()->id;
    
        $user_votes = json_decode($post->user_votes, true);
        $user_votes[$current_user] = 1;

        //print_r($user_votes);

        $post->votes = $post->votes + 1;
        $post->user_votes = json_encode($user_votes);
        $post->save();

        if($where == 'dashboard' && $type == "Latest") return redirect(url('/dashboard'));
        else if($where == 'dashboard') return redirect(url('/dashboard', [$type]));
        else if($type == "Latest") return redirect(url('/dashboard/author', [$post->user_id]));
        else return redirect(url('/dashboard/author', [$post->user_id, $type]));
    }

    public function downvote($id, $where, $type){
        
        //$post = POST::find($id);
        $post = Post::where('id', $id)->first();
        $current_user = Auth::user()->id;
    
        $user_votes = json_decode($post->user_votes, true);
        $user_votes[$current_user] = -1;

        //print_r($user_votes);

        $post->votes = $post->votes - 1;
        $post->user_votes = json_encode($user_votes);
        $post->save();
        
        if($where == 'dashboard' && $type == "Latest") return redirect(url('/dashboard'));
        else if($where == 'dashboard') return redirect(url('/dashboard', [$type]));
        else if($type == "Latest") return redirect(url('/dashboard/author', [$post->user_id]));
        else return redirect(url('/dashboard/author', [$post->user_id, $type]));
        
    }

    public function unvote($id, $where, $type){
        
        //$post = POST::find($id);
        $post = Post::where('id', $id)->first();
        $current_user = Auth::user()->id;
    
        $user_votes = json_decode($post->user_votes, true);
        $post->votes = $post->votes - $user_votes[$current_user];
        $user_votes[$current_user] = 0;

        //print_r($user_votes);

        $post->user_votes = json_encode($user_votes);
        $post->save();
        
        if($where == 'dashboard' && $type == "Latest") return redirect(url('/dashboard'));
        else if($where == 'dashboard') return redirect(url('/dashboard', [$type]));
        else if($type == "Latest") return redirect(url('/dashboard/author', [$post->user_id]));
        else return redirect(url('/dashboard/author', [$post->user_id, $type]));
    }

    public function upvote_to_downvote($id, $where, $type){
        
        //$post = POST::find($id);
        $post = Post::where('id', $id)->first();
        $current_user = Auth::user()->id;
    
        $user_votes = json_decode($post->
        user_votes, true);
        $user_votes[$current_user] = -1;

        //print_r($user_votes);
        $post->votes = $post->votes - 2;
        $post->user_votes = json_encode($user_votes);
        $post->save();
        
        if($where == 'dashboard' && $type == "Latest") return redirect(url('/dashboard'));
        else if($where == 'dashboard') return redirect(url('/dashboard', [$type]));
        else if($type == "Latest") return redirect(url('/dashboard/author', [$post->user_id]));
        else return redirect(url('/dashboard/author', [$post->user_id, $type]));
        
    }

    public function downvote_to_upvote($id, $where, $type){
        
        //$post = POST::find($id);
        $post = Post::where('id', $id)->first();
        $current_user = Auth::user()->id;
    
        $user_votes = json_decode($post->user_votes, true);
        $user_votes[$current_user] = 1;

        //print_r($user_votes);
        $post->votes = $post->votes + 2;
        $post->user_votes = json_encode($user_votes);
        $post->save();
        
        if($where == 'dashboard' && $type == "Latest") return redirect(url('/dashboard'));
        else if($where == 'dashboard') return redirect(url('/dashboard', [$type]));
        else if($type == "Latest") return redirect(url('/dashboard/author', [$post->user_id]));
        else return redirect(url('/dashboard/author', [$post->user_id, $type]));
    }
}
