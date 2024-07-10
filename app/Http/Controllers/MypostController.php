<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class MypostController extends Controller
{
    public function my_post(Request $request)
    {
        // $mypost = POST::all();
        $userid = $request->user()->id;
        $myposts = POST::where('user_id', $userid)->orderBy('created_at', 'DESC')->get();
        return view('mypost', ['myposts' => $myposts]);
    }
}
