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
         $follow_groups = \DB::table('groups')->join('group_user', 'groups.id', '=', 'group_user.group_id')->select('groups.*')->where('group_user.user_id', $user->id)->distinct()->paginate(20);
         $unfollow_groups = \DB::table('groups')->join('group_user', 'groups.id', '=', 'group_user.group_id')->select('groups.*')->where('group_user.user_id','!=', $user->id)->distinct()->paginate(20);
        
        
        return view('home',[
            'unfollow_groups'=> $unfollow_groups,
            'user' => $user,
            'follow_groups' => $follow_groups,
            ]);
    }
    
}