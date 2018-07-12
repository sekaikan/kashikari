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
        return redirect("/home");
    }
}
