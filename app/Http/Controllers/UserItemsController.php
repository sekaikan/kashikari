<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\User;

use App\Group;

use App\Notification;

use App\Comment;

class UserItemsController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'want_user_id' => 'required',
        ]);
        
        $is_wanting = Item::find($id)->want_user_id == $request->want_user_id;
        if ($is_wanting){
            $item = Item::find($id);
            $item->status = 'open';
            $item->want_user_id = NULL;
            $item->save();
            
            $comment = Comment::where('item_id',$id);
        
            $comment -> delete(); 
            
             $recipient = User::find(Item::find($id)->user_id);
            $request->user()->notifications()->create([
            'content' => $item->name,
            'user_id' => \Auth::id(),
            'item_id' => $item->id,
            'type' => 'cancel',
            'recipient_id' => $recipient->id,
            ]);
        }else{
            $item = Item::find($id);
            $item->status = 'closed';
            $item->want_user_id = $request->want_user_id;
            $item->save();
            
            $request->user()->comments()->create([
                'content' => 'Auto message: '. \Auth::user()->name.' sent a rent request to ' . User::find(Item::find($id)->user_id)->name.'.',
                'item_id' => $id,
                'parent_id' => NULL,
            ]);
            $recipient = User::find(Item::find($id)->user_id);
            $request->user()->notifications()->create([
            'content' => $item->name,
            'user_id' => \Auth::id(),
            'item_id' => $item->id,
            'recipient_id' => $recipient->id,
            ]);
        }
        return view('items.show', ['item' => $item,]);
    }
}
