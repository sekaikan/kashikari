<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\User;

use App\Group;

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
        return view('items.show', ['item' => $item, 'group' => $group,]); 
    }
    public function show($id)
    {
        
    }
}
