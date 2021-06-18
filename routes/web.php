<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Role\RoleUserController;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRoleController;
use App\Http\Controllers\User\UserExpedientController;

use App\Http\Controllers\Office\OfficeController;
use App\Http\Controllers\Office\OfficeSubofficeController;

use App\Http\Controllers\Suboffice\SubofficeController;
use App\Http\Controllers\Suboffice\SubofficeOfficeController;

use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\EmployeeUserController;
use App\Http\Controllers\Employee\EmployeeOfficeController;
use App\Http\Controllers\Employee\EmployeeSubofficeController;

use App\Http\Controllers\Processor\ProcessorController;
use App\Http\Controllers\Processor\ProcessorUserController;

use App\Http\Controllers\Expedient\ExpedientController;
use App\Http\Controllers\Expedient\ExpedientUserController;

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
Route::apiResource('users', UserController::class);                                            // OK
Route::apiResource('users.roles', UserRoleController::class)->only('index');                   // OK
Route::apiResource('users.expedients', UserExpedientController::class)->only('index');         // OK
// Route::apiResource('users.derivations', Controller::class)->only('index');
// Route::apiResource('users.archivations', Controller::class)->only('index');

/* Office */
Route::apiResource('offices', OfficeController::class);                                        // OK
Route::apiResource('offices.suboffices', OfficeSubofficeController::class)->only('index');     // OK

/* SubOffices */
Route::apiResource('suboffices', SubofficeController::class);                                  // OK
Route::apiResource('suboffices.offices', SubofficeOfficeController::class)->only('index');     // OK

/* Employee */
Route::apiResource('employees', EmployeeController::class);                                    // OK
Route::apiResource('employees.users', EmployeeUserController::class)->only('index');           // OK
Route::apiResource('employees.offices', EmployeeOfficeController::class)->only('index');       // OK
Route::apiResource('employees.suboffices', EmployeeSubofficeController::class)->only('index'); // OK
// Route::apiResource('employees.derivations', Controller::class)->only('index');

/* Processor */
Route::apiResource('processors', ProcessorController::class);                                  // OK
Route::apiResource('processors.users', ProcessorUserController::class)->only('index');         // OK

/**
 *  Expedients
 */ 
Route::apiResource('expedients', ExpedientController::class);                                  // OK
Route::apiResource('expedients.users', ExpedientUserController::class)->only('index');         // OK
// Route::apiResource('expedients.derivation ', ExpedientUserController::class)->only('index');
// Route::apiResource('expedients.arhcivation', ExpedientUserController::class)->only('index');

// Nested Resource
// http://example.com/articles/1/author"
// Route::resource('articles.author', [ArticlesAuthorController::class])->only('index', 'show')
