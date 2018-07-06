<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
 
use App\post;



class PostsController extends Controller
{
    public function index() 
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'posts' => $posts,
            ];
            return view('posts.index', $data);
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' =>  'required|max:191',
            
        ]);

        $request->user()->posts()->create([
            'content' => $request->content,
            'status'  => $request->status,
        ]);

        return redirect ("/posts");
    }
    
      
    public function create(Request $request)
    {
        $user = \Auth::user();
        return view('posts.create', [
        'user' => $user,
        
      ]);
      return redirect('/');
    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return redirect()->back();
    }
    
}
