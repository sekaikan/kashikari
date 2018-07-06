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
            'item_id'=> 'required',
            
        ]);
        
        $request->user()->comments()->create([
            'content' => $request->content,
            'item_id' => $request->item_id,
            
        ]);
        
        return redirect() -> back();
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
