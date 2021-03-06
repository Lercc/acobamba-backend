<?php

namespace App\Http\Controllers\Notification;

use App\Models\Expedient;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotificationRequest;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\NotificationCollection;

class NotificationController extends Controller
{
   
    public function index()
    {
        $notifications = Notification::paginate(15);
        return new NotificationCollection($notifications);
    }

    public function listEmployeeNotifications($employee)
    {
        $notifications = Notification::where('user', '=', $employee)
                                        ->where('user_type', '=', 'interno')
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(15);
        return new NotificationCollection($notifications);
    }

    public function listProcessorNotifications($processors)
    {
        $notifications = Notification::where('user', '=', $processors)
                                        ->where('user_type', '=', 'externo')
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(15);
        return new NotificationCollection($notifications);
    }

  //
    public function store(NotificationRequest $request)
    {
        $notification = Notification::create($request->validated());
        return new NotificationResource($notification);
    }

  
    public function show(Notification $notification)
    {
        return new NotificationResource($notification);
    }

    public function update(Request $request, Notification $notification)
    {
        //
    }

    public function destroy(Notification $notification)
    {
        //
    }
}
