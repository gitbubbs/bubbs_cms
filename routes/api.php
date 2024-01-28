<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ParagraphController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/', function () {
    
// })->middleware('auth');

// POST ROUTES

Route::post('/get_posts', [PostController::class, 'index']);

Route::post('/store_posts', [PostController::class, 'store']);

Route::post('/update_posts', [PostController::class, 'update']);

Route::post('/single_post', [PostController::class, 'single']);

Route::post('/delete_post', [PostController::class, 'delete']);

// PARAGRAPH ROUTES

Route::post('/store_paragraph', [ParagraphController::class, 'store']);

Route::post('/delete_paragraph', [ParagraphController::class, 'delete']);