<?php

use App\Http\Controllers\Api\PublicApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public API routes (add to routes/api.php)
|--------------------------------------------------------------------------
| These are read-only and unauthenticated on purpose — they only expose
| the same notices/resources/gallery content that is already public on
| the website. The static site's updates.js / script.js can fetch these.
*/

Route::get('/notices', [PublicApiController::class, 'notices']);
Route::get('/resources', [PublicApiController::class, 'resources']);
Route::get('/gallery', [PublicApiController::class, 'gallery']);
