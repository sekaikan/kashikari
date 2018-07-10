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
         $groups = \DB::table('groups')->join('group_user', 'groups.id', '=', 'group_user.group_id')->select('groups.*')->where('group_user.user_id', $user->id)->distinct()->paginate(10);
        
        
        return view('home',[
            'groups'=> $groups,
            'user' => $user,
    
            ]);
    }
    
}