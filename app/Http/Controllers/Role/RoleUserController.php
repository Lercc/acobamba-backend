<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Http\Resources\UserCollection;

class RoleUserController extends Controller
{
    public function index(Role $role) {
        // $users = $role->users;
        $users = User::where('role_id', $role->id)->paginate(2);
        return new UserCollection($users);
    }
}
