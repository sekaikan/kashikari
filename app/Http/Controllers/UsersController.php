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
        $follow_groups = \DB::table('groups')->join('group_user', 'groups.id', '=', 'group_user.group_id')->select('groups.*')->where('group_user.user_id', $user->id)->distinct()->paginate(20);
        return view('users.show', [
            'user' => $user,
            'items' => $items,
            'follow_groups' => $follow_groups,
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
        if(\Auth::id() == $user->id){
            \Auth::logout();
            $user->delete();
        }
        return view('thankyou');
    }
}
