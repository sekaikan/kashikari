<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('group.index', [
            //'books' => $books,
            //'posts' => $posts,
        ]);
    }
}
