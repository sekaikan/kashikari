<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = \Auth::user();
         $groups = Group::orderBy('updated_at', 'desc')->paginate(30);
        
        
        return view('home',[
            'groups'=> $groups,
            'user' => $user,
    
            ]);
    }
    
}