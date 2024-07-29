<?php

use App\Http\Controllers\Api\v1\CompleteTaskController;
use App\Http\Controllers\Api\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// v1 do not require Auth
Route::prefix('v1')->group(function() {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
});