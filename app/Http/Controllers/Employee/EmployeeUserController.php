<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class EmployeeUserController extends Controller
{
    public function index(Employee $employee) {
        $user = $employee->user;
        return new UserResource($user);
    }
}
