<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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

// Route::resource('posts', PostController::class)->only([
//     'show', 'store', 'getAll','getById','update','delete'
// ]);

Route::get('/posts', [PostController::class, 'getAll']);
Route::get('/posts/{id}', [PostController::class,  'getById']);
Route::post('/posts', [PostController::class,  'store']);
Route::put('/posts/{id}', [PostController::class,  'update']);
Route::delete('/posts/{id}', [PostController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
