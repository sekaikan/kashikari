<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
 
use App\Notification;

class NotificationsController extends Controller
{
    public function destroy(Request $request)
    {
        $notifications = Notification::find($request->notification_id);

        if (\Auth::id() === $notifications->recipient_id) {
            $notifications->delete();
        }

        return redirect()->back();
    }
    
    public function purge(Request $request)
    {
        \DB::table('notifications')->where('recipient_id', $request->user_id)->delete();
        
        return redirect()->back();
    }
    
        
    public function open_delete(Request $request)
    {
        $notification = Notification::find($request->notification_id);

        if (\Auth::id() === $notification->recipient_id) {
            $notification->delete();
        }
        if ($request->type == 'toPost') {
            return redirect(route('posts.show', ['id'=> $request->post_id]));
        }
        elseif($request->type == 'toItem'){
            return redirect(route('items.show', ['id'=> $request->item_id]));
        }else{
            
        }

    }
}
