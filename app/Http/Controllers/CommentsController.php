<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Item;

use App\Comment;

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
            'parent_id' =>$request->parent_id,
        ]);
        if($request->parent_id == NULL){
            $item = Item::find($request->item_id);
            $recipient = User::find($item->user_id);
            $request->user()->notifications()->create([
            'content' => $request->content,
            'recipient_id' => $recipient->id,
            'item_id' => $item->id,
            'user_id' => \Auth::id(),
            'type' => 'toItem',
            ]);    
        }elseif($request->parent_id != NULL){
            $comment = Comment::find($request->parent_id);
            $item = Item::find($request->item_id);
            $recipient = User::find($comment->user_id);
            $request->user()->notifications()->create([
            'content' => $comment->content,
            'recipient_id' => $recipient->id,
            'item_id' => $item->id,
            'user_id' => \Auth::id(),
            'type' => 'toComment',
            ]);  
        }
        
        
        return redirect()->back();
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
