<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("post");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'show' => 'required',
            'body' => 'required',
            'picture' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);
        
        $user = $request->user();
        $current_user = Auth::user()->id;
        $post = new Post;
        $imageName = NULL;

        if(isset($request->picture)){
            $imageName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('postImages'), $imageName);
        }
        
        $user_votes = [$current_user => 0];

        $post->title = $request->title;
        $post->show = $request->show;
        $post->body = $request->body;
        $post->picture = $imageName;
        $post->votes = 0;
        $post->user_votes = json_encode($user_votes);
        $user->post()->save($post);
        return redirect(route('post_index'))->withSuccess("Blog Posted !!!");
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = POST::find($id);
        return view('editpost', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'show' => 'required',
            'body' => 'required',
            'picture' => 'nullable|mimes:jpeg,jpg,png,gif'
        ]);

        //$post = POST::find($id);
        $post = Post::where('id', $id)->first();
        $imageName = NULL;

        //dd($request.all());
        
        if(isset($request->picture)){ 
            
            if($post->picture != NULL)
            {
                $image_path = public_path('postImages/'.$post->picture);

                if(file_exists($image_path))
                {
                    unlink($image_path);
                }
            }

            $imageName = time().'.'.$request->picture->extension();
            $request->picture->move(public_path('postImages'), $imageName);
            $post->picture = $imageName;
        }

        $post->title = $request->title;
        $post->show = $request->show;
        $post->body = $request->body;
        $post->save();
        return redirect(route('mypost'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        POST::destroy($id);
        return redirect(route('mypost'))->withSuccess("Your Post is Deleted !!!");
    }
}
?>