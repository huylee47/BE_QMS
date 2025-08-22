<?php
declare(strict_types=1);
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/v1/user', [UserController::class, 'index']);