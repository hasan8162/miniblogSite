<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_post($type = 'Latest'){
        // $posts = POST::all();
        if($type == "Latest")
            $posts = POST::where('show', 'Public')->orderBy('created_at', 'DESC')->get();
        
        else if($type == "Oldest")
            $posts = POST::where('show', 'Public')->get();
        
        else if($type == "Popular"){
            $posts = POST::where('show', 'Public')->orderBy('votes', 'DESC')
            ->orderBy('created_at', 'DESC')->get();
        }

        
        $current_user = Auth::user()->id;
        return view('dashboard', ['posts' => $posts, 'current_user' => $current_user, 'type' => $type]);
    }
}