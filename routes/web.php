<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRoleController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\RoleUserController;

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



// Nested Resource
// http://example.com/articles/1/author"
// Route::resource('articles.author', [ArticlesAuthorController::class])->only('index', 'show')
