<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\UserCollection;

class RoleUserController extends Controller
{
    public function index(Role $role) {
        $users = $role->users;
        // return $users;
        return new UserCollection($users);
    }
}
