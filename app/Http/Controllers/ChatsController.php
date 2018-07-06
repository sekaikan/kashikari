<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UsersController;

use App\Chat;

class ChatsController extends Controller
{
    public function index()
    {
        $chats = Chat::all();
        
        return view('chats.index', [
            'chats' => $chats,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:30000',
            
        ]);
        
        $request->user()->chats()->create([
            'content' => $request->content,
            
        ]);
        
         return redirect('group/chats');
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
