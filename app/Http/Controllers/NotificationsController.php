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

        if (\Auth::id() === $notifications->user_id) {
            $notifications->delete();
        }

        return redirect()->back();
    }
    
    public function purge(Request $request)
    {
        
        \DB::table('notifications')->where('user_id', $request->user_id)->delete();
        
        return redirect()->back();
    }
}
