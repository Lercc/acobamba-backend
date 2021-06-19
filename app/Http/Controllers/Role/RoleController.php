<?php

namespace App\Http\Controllers\Role;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\RolRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleCollection;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(15);
        return new RoleCollection($roles);
    }

    public function store(RolRequest $request)
    {
        //
    }

    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    public function update(Request $request, Role $role)
    {
        //
    }

    public function destroy(Role $role)
    {
        //
    }
}
