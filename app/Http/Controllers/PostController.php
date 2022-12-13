<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        // dd($request->image);
        $request->validate([
           

             'title' => ['required', 'string'],
             'author' => ['required', 'string'],
             'content' => ['required', 'string'],
             'image' => ['required','mimes:jpg,png,jpeg,max:2000'],
             'post_date'=> ['required'],

            
        ]);
        
        $postPic = $request['image'];
        $postExt = $postPic->guessExtension();
        $postPicName = time() . '-' . trim($request['author']) . 'post' . '.' . $postExt;
        $postPic->move(public_path('image_for_web'), $postPicName);
        $post = new Post($request->except('image'));
        $post->user_id = Auth::user()->id;
        $post->image =$postPicName;
       
        $post->post_date = date("Y-m-d H:i:s");
       
        $post->save(); 
        // $projects =post ::select('post_date');
        // $posts = Post::whereDate('post_date')->format('Y-m-d')->get();
        // {{ $data->created_at->isoFormat('dddd D') }}
        
        return redirect()->route("posts.index");
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
      
        $posts = Post::all();
        $comments = Comment::all()->where('post_id', $post->id);
        // dd($posts);
        
        return view("posts.show", [
            "post" => $post,
           
            "comments" => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
           
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string','unique:posts'],
            'author' => ['required', 'string'],
            'content' => ['required', 'string','min:20'],
            'image' => ['required','mimes:jpg,png,jpeg,max:2000'],
            'post_date'=> ['required'],
        ]);

        $post->update($request->all());

        return redirect()->route("posts.index"); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        $post->delete();

        return redirect()->route('posts.index');
    }
}
