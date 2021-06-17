<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\RoleUserController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRoleController;

use App\Http\Controllers\Office\OfficeController;
use App\Http\Controllers\Office\OfficeSubofficeController;

use App\Http\Controllers\Suboffice\SubofficeController;
use App\Http\Controllers\Suboffice\SubofficeOfficeController;

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeUserController;
use App\Http\Controllers\Employee\EmployeeOfficeController;
use App\Http\Controllers\Employee\EmployeeSubofficeController;


// Route::get('/', function () {
//     return view('');
// });
// Route::get('/user/{user}',[UserController::class, 'show']);

/**
 *  Roles
 */
Route::apiResource('roles', RoleController::class);
Route::apiResource('roles.users', RoleUserController::class)->only('index');

/**
 *  User
 */
Route::apiResource('users', UserController::class);
Route::apiResource('users.roles', UserRoleController::class)->only('index');

/* Office */
Route::apiResource('offices', OfficeController::class);
Route::apiResource('offices.suboffices', OfficeSubofficeController::class)->only('index');

/* SubOffices */
Route::apiResource('suboffices', SubofficeController::class);
Route::apiResource('suboffices.offices', SubofficeOfficeController::class)->only('index');

/* Employee */
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('employees.users', EmployeeUserController::class)->only('index');
Route::apiResource('employees.offices', EmployeeOfficeController::class)->only('index');
Route::apiResource('employees.suboffices', EmployeeSubofficeController::class)->only('index');


// Nested Resource
// http://example.com/articles/1/author"
// Route::resource('articles.author', [ArticlesAuthorController::class])->only('index', 'show')
