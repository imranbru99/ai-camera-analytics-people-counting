<?php

use App\Http\Controllers\SafetyIncidentReportController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/safety-incident-reports', [SafetyIncidentReportController::class, 'index']);
    Route::post('/safety-incident-reports', [SafetyIncidentReportController::class, 'store']);
    Route::put('/safety-incident-reports/{id}', [SafetyIncidentReportController::class, 'update']);
    Route::delete('/safety-incident-reports/{id}', [SafetyIncidentReportController::class, 'destroy']);
});
