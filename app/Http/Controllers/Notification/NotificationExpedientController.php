<?php

namespace App\Http\Controllers\Notification;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ExpedientResource;
//falta importar el expediente resource

class NotificationExpedientController extends Controller
{
    public function index(Notification $notification) {
        $expedient = $notification->expedient;
        return new ExpedientResource($expedient);
    }
}
