<?php

namespace App\Http\Controllers\Expedient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\NotificationCollection;
use App\Models\Expedient;
use App\Models\Notification;

class ExpedientNotificationController extends Controller
{
    public function index(Expedient $expedient) {
        $notifications = Notification::where('expedient_id', $expedient->id)->paginate(15);
        
        if (sizeof($notifications) != 0) {
            return new NotificationCollection($notifications);
        } else {
            return response()->json([
                'message' => 'El expediente no tiene notificaciones'
            ], 200);
        }
    }
}
