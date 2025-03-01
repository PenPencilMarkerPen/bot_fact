<?php

use App\Http\Controllers\Bot\MaxController;
use Illuminate\Support\Facades\Route;


Route::post('/webhook', [MaxController::class, 'index']);