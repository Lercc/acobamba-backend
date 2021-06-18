<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expedient;
use App\Models\User;
use App\Http\Resources\ExpedientCollection;

class UserExpedientController extends Controller
{
    public function index(User $user) {
        $expedients = Expedient::where('user_id', $user->id)->paginate(15);
        return new ExpedientCollection($expedients);
    }
}
