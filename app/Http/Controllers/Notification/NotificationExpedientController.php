<?php

namespace App\Http\Controllers\Notification;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//falta importar el expediente resource

class NotificationExpedientController extends Controller
{
    public function index(Notification $notification) {
        $expedient = $notition->expedient;
        return new ExpedientResource($expedient);
    }
}
