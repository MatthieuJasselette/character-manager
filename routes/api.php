<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function(){
    Route::apiResource('character', 'CharacterController');
    Route::get('raid', 'RaidController@index');
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::apiResource('user', 'UserController')
        ->only('index', 'show', 'update', 'destroy');
    Route::apiResource('image', 'ImageController')
        ->only('store', 'update', 'destroy');
    Route::apiResource('raidsnapshot', 'RaidSnapshotController')
        ->except('update');
    Route::get('dashboard-users', 'DashboardController@users');
    Route::get('dashboard-characters', 'DashboardController@characters');
    Route::get('dashboard-snapshots', 'DashboardController@snapshots');
    Route::put('dashboard-role/{user}', 'DashboardController@updateRole');
});
