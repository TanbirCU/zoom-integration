<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZoomController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/zoom/auth', [ZoomController::class, 'auth'])->name('zoom.auth');
Route::get('/zoom/callback', [ZoomController::class, 'callback']);
Route::get('/zoom/create-meeting', [ZoomController::class, 'createMeetingForm'])->name('zoom.create-meeting-form');
Route::post('/zoom/create-meeting', [ZoomController::class, 'createMeeting'])->name('zoom.create-meeting');
