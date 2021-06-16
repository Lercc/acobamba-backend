<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserRoleController extends Controller
{
    public function index(User $user) {
        $role = $user->role->name;
        return $role;
    }
}
