<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Archivation;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateCurrentPasswordRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role_id',1)->orderBy('id','desc')->paginate(8);
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

    public function updateRecoveryPassword(UpdateUserPasswordRequest $request, User $user){
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json('password actualizada correctamente!');
    }

    public function updateCurrentPassword(UpdateCurrentPasswordRequest $request, User $user){
        $user->password = bcrypt($request->new_password);
        $user->save();
        return response()->json('password actualizada correctamente!');
    }

    public function updateUserPassword(UpdateUserPasswordRequest $request, User $user){
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json('password actualizada correctamente!');
    }

    // cantidad de archivaciones realizadas
    public function userAmountArchivations(User $user)
    {
        $archivations = Archivation::where('user_id', '=', $user->id)->get();
        return $archivations;
    }

}
