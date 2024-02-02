<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemApiController;
use App\Http\Controllers\CategoryApiController;

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
Route::get('/category', [CategoryApiController::class, 'index']);
Route::post('/category/store',[CategoryApiController::class,'store']);
Route::delete('category/delete/{id}', [CategoryApiController::class,'destroy']);
Route::get('category/show/{id}', [CategoryApiController::class,'show']);
Route::get('category/edit/{id}', [CategoryApiController::class, 'edit']);
Route::post('category/update/{id}', [CategoryApiController::class, 'update']);
Route::get('/item', [ItemApiController::class, 'index']);
Route::post('/item/store',[ItemApiController::class,'store']);
Route::delete('item/delete/{id}', [ItemApiController::class,'destroy']);
Route::get('item/show/{id}', [ItemApiController::class,'show']);
Route::get('item/edit/{id}', [ItemApiController::class, 'edit']);
Route::post('item/update/{id}', [ItemApiController::class, 'update']);