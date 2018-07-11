<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use app\Group;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
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
      public function follow_groups($id)
    {
        $user = User::find($id);
        //$count_groups = $user->groups()->count();
        $groups = $user->groups()->paginate(10);

        $data = [
            'user' => $user,
            'groups' => $groups,
        ];

       // $data += $this->counts($user);

        return view('users.followings', $data);
    }

}
