<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Middleware;

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


Route::post('/login', [LoginController::class, 'login']);

Route::group(['middleware' => 'api','prefix' => 'auth'], function(){
    Route::post('/usuario', [LoginController::class, 'mostrar']);

});

Route::get('/by', [LoginController::class, 'maybeLog'])->middleware('authenticated');




Route::group(['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::get('/logout', [LoginController::class, 'logout']);
});




Route::get('/home', function (){
    return 'Primero logueate';
})->name('home');



