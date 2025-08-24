<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::get('/', [WeatherController::class, 'index']);
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');
