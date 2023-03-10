<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function markNotification($notification)
    {
        $user = Auth::user();

        $user->unreadNotifications->when($notification, function ($query) use ($notification) {
            return $query->where('id', $notification);
        })->markAsRead();
        
        return back();
    }
    
    public function markAllNotifications()
    {
        $user = Auth::user();

        $user->unreadNotifications->markAsRead();

        return back();
    }

}