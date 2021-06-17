<?php

namespace App\Http\Controllers\Processor;

use App\Models\Processor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class ProcessorUserController extends Controller
{
    public function index(Processor $processor) {
        $user = $processor->user;
        return new UserResource($user);
    }
}
