<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\RoleResource;

class UserRoleController extends Controller
{
    public function index(User $user) {
        $role = $user->role;
        return new RoleResource($role);
    }
}
