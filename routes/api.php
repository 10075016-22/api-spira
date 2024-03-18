<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function() {
    Route::post('login', [UserController::class, 'authenticate']);
    Route::group(['middleware' => ['jwt.verify']], function() {

        // Logout
        Route::post('/logout', [UserController::class, 'logout']);

        // modulos
        Route::resource('modules', ModuleController::class);

        // usuarios
        Route::get('getUsers', [UserController::class, 'get']);
        Route::resource('users', UserController::class);

        // cursos
        Route::get('getCourses', [CourseController::class, 'get']);
        Route::resource('courses', CourseController::class);

        // asignaciones
        Route::resource('assignments', AssignmentController::class);

        // roles
        Route::get('getRoles', [RoleController::class, 'get']);
        Route::resource('roles', RoleController::class);

        // roles
        Route::resource('permissions', PermissionController::class);

    });
});
