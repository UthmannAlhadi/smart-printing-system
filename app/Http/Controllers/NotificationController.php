<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead(Request $request)
    {
        $user = auth()->user();
        $user->unreadNotifications->markAsRead();

        return response()->json([
            'message' => 'Notifications marked as read.',
            'notifications' => $user->notifications->map(function ($notification) {
                return [
                    'id' => $notification->id,
                    'data' => $notification->data,
                    'read_at' => $notification->read_at,
                ];
            }),
        ]);
    }
}
