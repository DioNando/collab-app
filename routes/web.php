<?php

use App\Http\Controllers\CollaboratorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('collaborators.index');
});

Route::resource('collaborators', CollaboratorController::class);
Route::post('collaborators/{collaborator}/contact', [CollaboratorController::class, 'contact'])->name('collaborators.contact');
