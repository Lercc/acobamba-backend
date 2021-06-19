<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);
        return new UserCollection($users);
    }
 
    public function store(UserRequest $request)
    {
        $user = User::create($request->validated());
        $user->password = bcrypt($user->password);
        $user->save();
        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
