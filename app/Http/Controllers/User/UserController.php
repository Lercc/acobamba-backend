<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',1)->paginate(15);
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

    public function update(UserUpdateRequest $request, User $user)
    {
        /**
         * Definir que se le va a permitir actualizar respecto a admin:
         * name, last_name, email[******]@admin.com, status
         */
        $user->update($request->validated());
        $user->password = bcrypt($user->password);
        $user->save();
        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        //
    }

    public function updatePassword( ){
        
    }
}
