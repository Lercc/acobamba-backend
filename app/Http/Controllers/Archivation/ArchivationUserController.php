<?php

namespace App\Http\Controllers\Archivation;

use App\Models\Archivation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ArchivationUserController extends Controller
{
    public function index(Archivation $archivation) {
        $user = $archivation->user;
        return new UserResource($user);
    }
}
