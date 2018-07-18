<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\User;

use App\Group;

use App\Notification;

class UserItemsController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'want_user_id' => 'required',
        ]);
        
        $item = Item::find($id);
        $item->status = 'closed';
        $item->want_user_id = $request->want_user_id;
        $item->save();
        $group = Group::find(1);

        
        $recipient = User::find(Item::find($id)->user_id);
            $request->user()->notifications()->create([
            'content' => $item->name,
            'user_id' => $recipient->id,
            'item_id' => $item->id,
            'sender_id' => \Auth::id(),
            ]);
            
    return view('items.show', ['item' => $item, 'group' => $group,]); 
    }
    public function show($id)
    {
        
    }
}
