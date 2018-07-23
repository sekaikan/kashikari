<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Group;

use App\Item;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $items = Item::where('user_id', $id)->paginate(4);

        return view('users.show', [
            'user' => $user,
            'items' => $items,
        ]);
    }
    
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'content' => 'max:191',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->content = $request->content;
        $user->save();

        return redirect(route('users.show', \Auth::user()->id));
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/'); 
    }
}
