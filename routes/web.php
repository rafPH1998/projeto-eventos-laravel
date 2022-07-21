<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

//login
Route::prefix('/', EventsController::class)->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'autenticate'])->name('autenticate');
});

//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//rotas para registro
Route::prefix('/register', EventsController::class)->group(function() {
    Route::get('/', [RegisterController::class, 'index'])->name('register');
    Route::post('/', [RegisterController::class, 'register']);
});

//rotas de eventos que estao autenticadas
Route::middleware(['auth'])->group(function(){
    Route::prefix('/events', EventsController::class)->group(function() {
        Route::get('/', [EventsController::class, 'index'])->name('event.index');
        Route::get('/create', [EventsController::class, 'create'])->name('event.create');
        Route::post('/create', [EventsController::class, 'store'])->name('event.store');
        Route::get('/show/{id}', [EventsController::class, 'show'])->name('event.show');
        Route::get('/myevents', [EventsController::class, 'myEvents'])->name('event.myevents');
        Route::post('/myevents/confirmEvents/{id}', [EventsController::class, 'confirm'])->name('events.confirm');
        Route::get('/edit/{id}', [EventsController::class, 'edit'])->name('events.edit');
        Route::put('/edit/{id}', [EventsController::class, 'update'])->name('events.update');
        Route::delete('/delete/{id}', [EventsController::class, 'delete'])->name('events.delete');
    });   
}); 

// Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
