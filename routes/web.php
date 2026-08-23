<?php


use App\Http\Controllers\InviteController;
use App\Http\Controllers\MemorySkyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationOgController;



Route::get(
    '/',
    InviteController::class
)->name('invite.public');

Route::get('/og/{token}', InvitationOgController::class)
    ->name('og.invitation');

Route::get(
    '/og-view/{token}',
    [InvitationOgController::class, 'view']
)->name('og.view');

Route::get(
    '/og/{token}',
    [InvitationOgController::class, 'image']
)->name('og.invitation');

Route::get(
    '/calendar',
    \App\Http\Controllers\CalendarController::class
)->name('calendar');

Route::get(
    '/invite/{token}',
    InviteController::class
)->name('invite.show');

Route::get(
    '/memory-sky',
    MemorySkyController::class
)->name('memory-sky');
