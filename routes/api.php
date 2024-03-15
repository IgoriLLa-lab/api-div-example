<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/application', [ApiController::class, 'submitApplication']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/applications', [ApiController::class, 'getApplications']);
    Route::post('/application/{id}', [ApiController::class, 'respondToApplication']);
});
