<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\BoletinsController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\Professores_Materias;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard') //uri é o que tu pesquisa no navegador //view é o caminho utilizado nas pastas
    ->middleware(['auth', 'verified']) //verifica se esta logado
    ->name('dashboard'); // show de bola marcio


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});
Route::resource('alunos',AlunosController::class)
    ->only('index','create','update','store','show','edit','destroy');

Route::resource('materias',MateriasController::class)
    ->only('index','create','update','store','show','edit','destroy');
    
Route::resource('professores',controller: ProfessoresController::class)
    ->parameters(["professores"=>"professor"]);

Route::resource('boletins',controller: BoletinsController::class)
     ->parameters(['boletins' => 'boletim']);

Route::resource("professores_materias",Professores_Materias::class);

require __DIR__.'/auth.php';
