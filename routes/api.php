<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ParagraphController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Unprotected route for login
Route::post('/login', [AuthController::class, 'login'])->name('login');


// Routes protected with auth:sanctum middleware
Route::middleware('auth:sanctum')->group(function () {

    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // POST ROUTES
    Route::post('/get_posts', [PostController::class, 'index']);
    Route::post('/store_posts', [PostController::class, 'store']);
    Route::post('/update_posts', [PostController::class, 'update']);
    Route::post('/single_post', [PostController::class, 'single']);
    Route::post('/delete_post', [PostController::class, 'delete']);

    // PARAGRAPH ROUTES
    Route::post('/get_paragraph', [ParagraphController::class, 'index']);
    Route::post('/store_paragraph', [ParagraphController::class, 'store']);
    Route::post('/update_paragraph', [ParagraphController::class, 'update']);
    Route::post('/delete_paragraph', [ParagraphController::class, 'delete']);

});
