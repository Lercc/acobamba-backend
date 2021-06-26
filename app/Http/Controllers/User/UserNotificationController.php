<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationCollection;

class UserNotificationController extends Controller
{
    public function index(User $user) {
        $notifications = Notification::get();
//        $expedient = Expedient::where('user_id',$user->id)->get();
        return  $notifications;

        //     return new NotificationCollection($notifications);
        // } else {
        //     return response()->json([
        //         'message' => 'El usuario no tiene notificaciones'
        //     ], 200);
        // }
    }
}

