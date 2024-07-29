<?php

use App\Http\Controllers\Api\v2\CompleteTaskController;
use App\Http\Controllers\Api\v2\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// v2 require Auth
Route::middleware('auth:sanctum')->prefix('v2')->group(function() {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});