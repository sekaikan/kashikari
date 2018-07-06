<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Item;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:30000',
            
        ]);
        
        $request->user()->comments()->create([
            'content' => $request->content,
            
        ]);
        
         return redirect('/items');
    }
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        if (\Auth::id() === $comment->user_id){
            $comment -> delete();  
        }
        
        return redirect() -> back();
    }
}
