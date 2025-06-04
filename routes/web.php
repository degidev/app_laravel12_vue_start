<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/menu', function () {
    return Inertia::render('Menu');
});

Route::get('/menu/submenucito', function () {
    return Inertia::render('Submenucito');
});

// Rutas de configuración agrupadas con middleware de autenticación
Route::prefix('configuration')
    ->middleware(['auth', 'verified']) // Protege todas las rutas con autenticación
    ->group(function () {
        Route::get('/tipo-documento', function () {
            return Inertia::render('configuration/tipo-documento/TipoDocumento');
        });
        
        // Aquí puedes añadir más rutas de configuración
    });
 

Route::get('/hola-mundo', function () {
    return Inertia::render('HolaMundo');
})->name('hola-mundo');

Route::get('/webtest', function () {
    return view('web.web'); // Asumiendo que tu vista está en resources/views/web/web.blade.php
})->name('webtest');



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
