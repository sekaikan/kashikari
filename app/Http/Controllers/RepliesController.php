<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\User;
 
use App\Post;

use App\Reply;

use App\Notification;

class RepliesController extends Controller
{
    /*public function index() 
    {
        $data = [];
        if (\Auth::check()) {
            $users = User::all();
            $replies =Reply::with('user')->orderBy('created_at', 'desc')->paginate(10);
            $data = [
                'user' => $user,
                'replies' => $replies,
            ];
            return view('replies.index', $data);
        }
    }*/
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $request->user()->replies()->create([
            'content' => $request->content,
            'status'  => $request->status,
            'post_id' => $request->post_id,
            'reply_id' => $request->reply_id,
        ]);
        
        
        if ($request->reply_id != NULL)
        {
            $recipient = User::find(Reply::find($request->reply_id)->user_id);
            $request->user()->notifications()->create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'recipient_id' => $recipient->id,
            ]);
        }
        else
        {
            $recipient = User::find(Post::find($request->post_id)->user_id);
            $request->user()->notifications()->create([
            'content' => $request->content,
            'post_id' => $request->post_id,
            'recipient_id' => $recipient->id,
            ]);
        }

       return redirect(route('posts.show', $request->post_id));;
    }
    
      
    public function create(Request $request)
    {
        $user = \Auth::user();
        $reply = Reply::find($request->reply_id);
        return view('replies.create', [
        'user' => $user,
        'reply' => $reply,
        
      ]);
      return redirect('/');
    }
    
    public function destroy($id)
    {
        $replies = \App\Reply::find($id);

        if (\Auth::id() === $replies->user_id) {
            $replies->delete();
        }

        return redirect()->back();
    }
    
}
