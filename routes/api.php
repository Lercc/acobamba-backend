<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Role\RoleController;

use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Logout\LogoutController;

use App\Http\Controllers\Office\OfficeController;
use App\Http\Controllers\Role\RoleUserController;

use App\Http\Controllers\User\UserRoleController;
use App\Http\Controllers\Employee\EmployeeController;

use App\Http\Controllers\Expedient\ExpedientController;
use App\Http\Controllers\Processor\ProcessorController;

use App\Http\Controllers\Suboffice\SubofficeController;
use App\Http\Controllers\User\UserDerivationController;

use App\Http\Controllers\User\UserArchivationController;
use App\Http\Controllers\Derivation\DerivationController;
use App\Http\Controllers\Employee\EmployeeUserController;
// use App\Http\Controllers\User\UserNotificationController;
use App\Http\Controllers\Office\OfficeSubofficeController;
use App\Http\Controllers\Archivation\ArchivationController;

use App\Http\Controllers\Employee\EmployeeOfficeController;
use App\Http\Controllers\Processor\ProcessorUserController;
use App\Http\Controllers\Derivation\DerivationUserController;

use App\Http\Controllers\Notification\NotificationController;
// use App\Http\Controllers\Expedient\ExpedientUserController;
use App\Http\Controllers\Suboffice\SubofficeOfficeController;
use App\Http\Controllers\Employee\EmployeeExpedientController;
use App\Http\Controllers\Employee\EmployeeSubofficeController;
use App\Http\Controllers\Archivation\ArchivationUserController;
use App\Http\Controllers\Employee\EmployeeDerivationController;

use App\Http\Controllers\Expedient\ExpedientEmployeeController;
use App\Http\Controllers\Expedient\ExpedientProcessorController;
use App\Http\Controllers\Processor\ProcessorExpedientController;
use App\Http\Controllers\Derivation\DerivationEmployeeController;
use App\Http\Controllers\Expedient\ExpedientDerivationController;

use App\Http\Controllers\Notification\NotificationUserController;
use App\Http\Controllers\Derivation\DerivationExpedientController;
use App\Http\Controllers\Expedient\ExpedientArchivationController;

use App\Http\Controllers\Expedient\ExpedientNotificationController;
use App\Http\Controllers\Archivation\ArchivationExpedientController;
use App\Http\Controllers\Derivation\DerivationChangeStateController;
use App\Http\Controllers\Notification\NotificationExpedientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/**
 * Login
 */

Route::post('login', [ LoginController::class, 'login' ]);

/**
 * Logout
 */
Route::post('logout', [ LogoutController::class, 'logout' ])->middleware('auth:sanctum');


/**
 *  Roles
 */
Route::apiResource('roles', RoleController::class)->middleware('auth:sanctum');                                                  // OK
Route::apiResource('roles.users', RoleUserController::class)->only('index')->middleware('auth:sanctum');                         // OK

/**
 *  User
 */
Route::apiResource('users', UserController::class)->middleware('auth:sanctum');                                                   // OK
Route::apiResource('users.roles', UserRoleController::class)->only('index')->middleware('auth:sanctum');                        // OK
// Route::apiResource('users.expedients', UserExpedientController::class)->only('index');           // OK
Route::apiResource('users.derivations',UserDerivationController::class)->only('index')->middleware('auth:sanctum');             // OK
Route::apiResource('users.archivations',UserArchivationController::class)->only('index')->middleware('auth:sanctum'); 
// Route::apiResource('users.notifications',UserNotificationController::class)->only('index')->middleware('auth:sanctum');

/* Office */
Route::apiResource('offices', OfficeController::class)->middleware('auth:sanctum');                                             // OK
Route::apiResource('offices.suboffices', OfficeSubofficeController::class)->only('index')->middleware('auth:sanctum');          // OK

/* SubOffices */
Route::apiResource('suboffices', SubofficeController::class)->middleware('auth:sanctum');                                        // OK
Route::apiResource('suboffices.offices', SubofficeOfficeController::class)->only('index')->middleware('auth:sanctum');           // OK

/* Employee */
Route::apiResource('employees', EmployeeController::class)->middleware('auth:sanctum');                                          // OK
Route::apiResource('employees.users', EmployeeUserController::class)->only('index')->middleware('auth:sanctum');                 // OK
Route::apiResource('employees.offices', EmployeeOfficeController::class)->only('index')->middleware('auth:sanctum');             // OK
Route::apiResource('employees.suboffices', EmployeeSubofficeController::class)->only('index')->middleware('auth:sanctum');       // OK
Route::apiResource('employees.derivations', EmployeeDerivationController::class)->only('index')->middleware('auth:sanctum');
Route::apiResource('employees.expedients', EmployeeExpedientController::class)->only('index')->middleware('auth:sanctum');       // NUEVO OK

/* Processor */
Route::apiResource('processors', ProcessorController::class)->middleware('auth:sanctum');                                        // OK
Route::apiResource('processors.users', ProcessorUserController::class)->only('index')->middleware('auth:sanctum');               // OK
Route::apiResource('processors.expedients', ProcessorExpedientController::class)->only('index')->middleware('auth:sanctum');     // NUEVO OK

/**
 *  Expedients
 */ 
Route::apiResource('expedients', ExpedientController::class)->middleware('auth:sanctum');                                          // OK
// Route::apiResource('expedients.users', ExpedientUserController::class)->only('index');              // OK
Route::apiResource('expedients.derivations', ExpedientDerivationController::class)->only('index')->middleware('auth:sanctum');     // OK
Route::apiResource('expedients.archivations', ExpedientArchivationController::class)->only('index')->middleware('auth:sanctum');   // OK
Route::apiResource('expedients.notifications', ExpedientNotificationController::class)->only('index')->middleware('auth:sanctum'); // OK
Route::apiResource('expedients.processors', ExpedientProcessorController::class)->only('index')->middleware('auth:sanctum');         // NUEVO OK
Route::apiResource('expedients.employees', ExpedientEmployeeController::class)->only('index')->middleware('auth:sanctum');         // NUEVO OK

/* Derivation */
Route::put('changeDerivationState/{derivation}', [ DerivationChangeStateController::class, 'changeState' ])->middleware('auth:sanctum');
Route::apiResource('derivations', DerivationController::class)->middleware('auth:sanctum');                                     // OK
Route::apiResource('derivations.expedients', DerivationExpedientController::class)->only('index')->middleware('auth:sanctum');  // OK
Route::apiResource('derivations.users', DerivationUserController::class)->only('index')->middleware('auth:sanctum');            // OK
Route::apiResource('derivations.employees', DerivationEmployeeController::class)->only('index')->middleware('auth:sanctum');    // OK

/* Archivation */
Route::apiResource('archivations', ArchivationController::class)->middleware('auth:sanctum');                                    // OK
Route::apiResource('archivations.expedients', ArchivationExpedientController::class)->only('index')->middleware('auth:sanctum'); // OK
Route::apiResource('archivations.users', ArchivationUserController::class)->only('index')->middleware('auth:sanctum');           // OK


/* Notification */
Route::apiResource('notifications', NotificationController::class)->middleware('auth:sanctum');                                   // OK
Route::apiResource('notifications.expedients', NotificationExpedientController::class)->only('index')->middleware('auth:sanctum');// OK
// Route::apiResource('notifications.employees', NotificationEmployeeController::class)->only('index')->middleware('auth:sanctum');// OK

// Nested Resource
// http://example.com/articles/1/author"
// Route::resource('articles.author', [ArticlesAuthorController::class])->only('index', 'show')