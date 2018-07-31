<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupUserController extends Controller
{
     public function store(Request $request, $id)
    {
        \Auth::user()->follow($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        \Auth::user()->items()->where('group_id',$id)->delete();
        \Auth::user()->chats()->where('group_id',$id)->delete();
        \Auth::user()->posts()->where('group_id',$id)->delete();
        return redirect("/home");

    }
}
