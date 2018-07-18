<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\User;

use \App\Item;

use \App\Post;

use \App\Group;

class GroupsController extends Controller
{
    public function index($id)
    {
        $user = \Auth::user();
        $group = Group::find($id);
       // $items = Item::orderBy('updated_at', 'desc')->paginate(8);
        $items =\DB::table('items')->where('items.group_id', $group->id)->distinct()->paginate(20);
        //$posts = $user->posts()->orderBy('created_at', 'desc')->paginate(5);
        $posts = \DB::table('posts')->where('posts.group_id', $group->id)->distinct()->paginate(20);
        return view('groups.home', [
            'items' => $items,
            'group' => $group,
            //'users' => $users,
            'posts' => $posts,
        ]);
    }
    
    public function create()
    {
        $group = new Group;
        
         return view('groups.create', ['group' => $group,]);
    }
    
    public function store(request $request)
    {
          $this->validate($request, [
            'name' => 'required',

        ]);
       
        $request->user()->groups()->create([
            'name' => $request->name,
        ]);
        
        return redirect('/home');
    }
    
    public function edit()
    {
        
    }
    
    public function show($id)
    {
        $user = \Auth::user();
        $group = Group::find($id);
        
        if($user->is_following($id)){
        $items =\DB::table('items')->where('items.group_id', $group->id)->distinct()->paginate(20);
        //$items = Item::orderBy('updated_at', 'desc')->paginate(8);
        $posts = \DB::table('posts')->where('posts.group_id', $group->id)->distinct()->paginate(20);
        //$posts = $user->posts()->orderBy('created_at', 'desc')->paginate(5);
        return view('groups.home', [
            'items' => $items,
            'group' => $group,
            'posts' => $posts,
            'user' => $user,
        ]);
        }else{
        return view('groups.show', [
            'group' => $group,
            'user' => $user,
        ]);
        }
    }
    
    public function update()
    {
        
    }
    
    public function destroy($id)
    {
        $group = Group::find($id);
        $group -> delete();
        
    return redirect('/home');
    }

}

