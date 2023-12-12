<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Webhook Routes
|--------------------------------------------------------------------------
|
| Registro das rotas de webhook.
|
*/

Route::post('/platform', [WebhookController::class, 'platform']);
