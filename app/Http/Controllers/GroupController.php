<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use \App\User;

use \App\Post;

class GroupController extends Controller
{
    public function index()
    {
        
        return view('groups.home', [
            //'books' => $books,
            //'posts' => $posts,
        ]);
    }
}
