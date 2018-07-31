<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Chat;

use App\User;

use App\Group;

class ChatsController extends Controller
{
    public function index($id)
    {
        $group = Group::find($id);
        //$chats = Chat::with('user')->orderBy('created_at', 'desc')->paginate(20);
        $chats = \DB::table('chats')->where('chats.group_id', $group->id)->orderBy('created_at', 'desc')->paginate(9);
        //$chats = \DB::table('chats')->orderBy('created_at', 'desc')->paginate(100);
        $groupusers= $group->users()->get();
        return view('chats.index', [
            'chats' => $chats,
            'group' => $group,
            'groupusers' => $groupusers->take(5),
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:30000',
            'group_id'=> 'required',
            
        ]);
        
        $request->user()->chats()->create([
            'content' => $request->content,
            'group_id' => $request->group_id,
        ]);
        
         return redirect(route('chats.index', $request->group_id));
    }
    
    public function destroy($id)
    {
        $chat = Chat::find($id);
        
        if (\Auth::id() === $chat->user_id){
            $chat -> delete();  
        }
        
        return redirect() -> back();
    }

}
