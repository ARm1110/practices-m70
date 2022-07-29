<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showNotification()
    {
        $user = User::find(auth()->user()->id);
        $notification =  $user->unreadNotifications;


        return view('dashboard.notification.admin.index', compact('notification'));
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->notifications->where('id', $request->id)->markAsRead();

        return back()->with('message', 'Notification marked as read');
    }

    public function delete(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->notifications->where('id', $request->id)->first()->delete();

        return back()->with('message', 'Notification deleted');
    }
}
