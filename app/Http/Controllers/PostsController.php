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
    public function index($id) 
    {
        $data = [];
        if (\Auth::check()) {
            $users = User::all();
            $group = Group::find($id);
            $posts = \DB::table('posts')->where('posts.group_id', $group->id)->distinct()->paginate(20);
            //$posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
            $user = \Auth::user();
            $groupusers= $group->users()->get();
            $data = [
                'users' => $users,
                'posts' => $posts,
                'group' => $group,
                'user' => $user,
                'groupusers' =>$groupusers,
                
            ];
            
            return view('posts.index', $data);
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' =>  'required|max:191',
            'group_id' => 'required',
            
        ]);

        $request->user()->posts()->create([
            'content' => $request->content,
            'status'  => $request->status,
            'group_id' => $request->group_id,
        ]);

         return redirect(route('posts.index', $request->group_id));
    }
    
      
    public function borrow($id)
    {
        $post = new Post;
        $group = Group::find($id);
        $user = \Auth::user();
        $items = \DB::table('items')->where('items.group_id', $group->id)->distinct()->paginate(20);
        $groupusers= $group->users()->get();
        return view('posts.create', [
        'user' => $user, 
        'group' => $group, 
        'items' => $items,
        'groupusers' => $groupusers,
        'post' => $post,
        
      ]);
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
