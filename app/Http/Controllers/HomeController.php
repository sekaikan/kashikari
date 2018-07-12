<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Group;

use App\User;

use App\Notification;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

         $user = \Auth::user();
         $follow_groups = \DB::table('groups')->join('group_user', 'groups.id', '=', 'group_user.group_id')->select('groups.*')->where('group_user.user_id', $user->id)->distinct()->paginate(20);
         $unfollow_groups = \DB::table('groups')->join('group_user', 'groups.id', '=', 'group_user.group_id')->select('groups.*')->where('group_user.user_id','!=', $user->id)->distinct()->paginate(20);
         //$groups = Group::orderBy('updated_at', 'desc')->paginate(20);
      
        return view('home',[
            'unfollow_groups'=> $unfollow_groups,
            'user' => $user,
            'follow_groups' => $follow_groups,
            //'groups' =>$groups,
            ]);
    }
    
}