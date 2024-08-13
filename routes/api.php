<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\DivisionController;
use App\Http\Controllers\API\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(
  ['prefix' => 'auth'],
  function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
  }
);

Route::group(
  [
    'prefix' => 'divisions',
    'middleware' => 'auth:sanctum'
  ],
  function () {
    Route::get('/', [DivisionController::class, 'index']);
  }
);

Route::group(
  [
    'prefix' => 'employees',
    'middleware' => 'auth:sanctum'
  ],
  function () {
    Route::get('/', [EmployeeController::class, 'index']);
    Route::post('/', [EmployeeController::class, 'store']);
    Route::put('/{id}', [EmployeeController::class, 'update']);
    Route::delete('/{id}', [EmployeeController::class, 'destroy']);
  }
);
