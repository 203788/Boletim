<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard') //uri é o que tu pesquisa no navegador //view é o caminho utilizado nas pastas
    ->middleware(['auth', 'vnerified']) //verifica se esta logado
    ->name('dashboard'); // show de bola marcio

    Route::view('teste', 'teste')
    ->middleware(['auth', 'verified'])
    ->name('teste');


    Route::view('teste', 'teste')
    ->middleware(['auth', 'verified'])
    ->name('teste');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
