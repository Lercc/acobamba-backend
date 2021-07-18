<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\UserCollection;

class UserAllController extends Controller
{
    public function getUserAll()
    {
        $users = User::get();
        return new UserCollection($users);
    }
}
