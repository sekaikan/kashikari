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
            $posts = \DB::table('posts')->where('posts.group_id', $group->id)->orderBy('status', 'asc')->orderBy('created_at', 'desc')->paginate(7);
            //$posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
            $user = \Auth::user();
            $groupusers= $group->users()->get();
            $data = [
                'users' => $users,
                'posts' => $posts,
                'group' => $group,
                'user' => $user,
                'groupusers' =>$groupusers->take(5),
                
            ];
            
            return view('posts.index', $data);
        }
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'group_id' => 'required',
            'status' => 'required',
            
        ]);

        $request->user()->posts()->create([
            'content' => $request->content,
            'group_id' => $request->group_id,
            'status' => $request->status,
        ]);

         return redirect(route('posts.index', $request->group_id));
    }
    
      
    public function borrow($id)
    {
        $post = new Post;
        $group = Group::find($id);
        $user = \Auth::user();
        $items = \DB::table('items')->where('items.group_id', $group->id)->orderBy('status', 'desc')->orderBy('created_at', 'desc')->paginate(9);
        $groupusers= $group->users()->get();
        return view('posts.create', [
        'user' => $user, 
        'group' => $group, 
        'items' => $items,
        'groupusers' => $groupusers->take(5),
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
        
        return view('posts.show', ['post' =>$post,]);
    }
    
}
