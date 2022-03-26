<?php

use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\SubscriberController;
use App\Http\Controllers\API\WebsiteController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('website/create', [WebsiteController::class,'store']);
Route::get('website/all', [WebsiteController::class,'index']);
Route::get('website/{id}', [WebsiteController::class,'show']);

Route::post('post/create', [PostController::class,'store']);
Route::get('post/all', [PostController::class,'index']);
Route::get('post/{id}', [PostController::class,'show']);

Route::post('subscribe/create', [SubscriberController::class,'store']);
Route::get('subscribe/all', [SubscriberController::class,'index']);
Route::get('subscribe/{id}', [SubscriberController::class,'show']);
