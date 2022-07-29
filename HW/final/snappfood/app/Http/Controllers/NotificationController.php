<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\AlertNotification;
use App\Notifications\AuthNotification;
use Notification;
use App\Notifications\OffersNotification;
use Cache;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('product');
    }

    public function sendOfferNotification()
    {
        $userSchema = User::first();

        $mail = [
            'name' => $userSchema->name,
            'email' => $userSchema->email,
            'message' => 'This is a test notification',

        ];

        Notification::send($userSchema, new AuthNotification($mail));

        dd('Task completed!');
    }

    public function sendRequestToShopper()
    {
        $admin = User::where('role', 'admin')->first();


        $data = [
            'title' => ' new request to shopper',
            'body' => 'request to shopper ' . auth()->user()->fullName, ' has been sent to you',
        ];
        //check dose not have a cache 
        if (Cache::has('notification-' . auth()->user()->id)) {
            return back()->with('info', 'You have already sent a request');
        }

        Notification::send($admin, new AlertNotification($data));
        //cache the notification
        Cache::put('notification-' . auth()->user()->id, 'send request');

        return back()->with('success', 'Request sent successfully');
    }
}
