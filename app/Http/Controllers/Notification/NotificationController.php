<?php

namespace App\Http\Controllers\Notification;

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

  
    public function store(NotificationRequest $request)
    {
        //
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
