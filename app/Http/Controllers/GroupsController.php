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
    public function index()
    {
        $user = \Auth::user();
        $items = Item::orderBy('updated_at', 'desc')->paginate(4);
        $user = \Auth::user();
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(5);
        return view('groups.home', [
            'items' => $items,
            //'users' => $users,
            'posts' => $posts,
        ]);
    }
    
    public function create()
    {
        $group = new Group;
        
         return view('groups.create', ['group' => $group,]);
    }
    
    public function store()
    {
          $this->validate($request, [
            'name' => 'required',

        ]);
       
        $request->user()->items()->create([
            'name' => $request->name,
        ]);
        
          return redirect('/group/home');
    }
    
    public function edit()
    {
        
    }
    
    public function show()
    {
        
    }
    
    public function update()
    {
        
    }
    
    public function destroy()
    {
        
    }
}

