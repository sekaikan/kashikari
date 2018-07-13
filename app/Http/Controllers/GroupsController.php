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
        $items = Item::orderBy('updated_at', 'desc')->paginate(8);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(5);
        $group = Group::find($id);
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
        $items = Item::orderBy('updated_at', 'desc')->paginate(8);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(5);
        return view('groups.home', [
            'items' => $items,
            'group' => $group,
            'posts' => $posts,
            'user' => $user,
        ]);
        }else{
        $items = Item::orderBy('updated_at', 'desc')->paginate(8);
        return view('groups.show', [
            'items' => $items,
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
    
    public function followers($id)
    {
        $user = User::find($id);
        //$count_users = $group->users()->count();
        $users = $group->users()->paginate(10);

        $data = [
            'user' => $user,
            'group' => $group,
            
        ];

        //$data += $this->counts($user);

        return view('users.followers', $data);
    }
}

