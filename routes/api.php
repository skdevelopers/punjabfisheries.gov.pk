<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GisController;


// Public read-only
Route::get('/gis/places', [GisController::class, 'places']);
Route::get('/gis/search', [GisController::class, 'search']);


// Admin (edit/publish)
Route::middleware(['auth:sanctum', 'permission:gis.edit'])->group(function () {
    Route::post('/gis/bulk-upsert', [GisController::class, 'bulkUpsert']);
    Route::post('/gis/import-kml', [GisController::class, 'importKml']); // KML/KMZ → GeoJSON → DRAFT
});
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
