<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\AuthNotification;
use Notification;
use App\Notifications\OffersNotification;

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
        $userSchema = User::first();

        $mail = [
            'name' => $userSchema->name,
            'email' => $userSchema->email,
            'message' => 'This is a test notification',

        ];

        Notification::send($userSchema, new RequestJoinNotification($mail));

        dd('Task completed!');
    }
}
