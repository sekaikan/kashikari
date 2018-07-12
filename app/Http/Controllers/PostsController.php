<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
 
use App\Post;

use App\Group;

use App\Item;



class PostsController extends Controller
{
    public function index() 
    {
        $data = [];
        if (\Auth::check()) {
            $users = User::all();
            $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
            $group = Group::find(1);
            $data = [
                'users' => $users,
                'posts' => $posts,
                'group' => $group,
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
        $group = Group::find(1);
         $items = Item::orderBy('updated_at', 'desc')->paginate(20);
        return view('posts.create', [
        'user' => $user, 'group' => $group, 'items' =>$items,
        
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
    
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show', ['post' =>$post]);
    }
    
}
