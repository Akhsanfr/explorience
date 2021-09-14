<?php

use App\Http\Livewire\C\GoogleLogin;
use App\Http\Livewire\S\Artikel;
use App\Http\Livewire\S\Home;
use App\Http\Livewire\D\Home as HomeDashboard;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Home::class)->name('home');
Route::get('/judul-artikel', Artikel::class)->name('artikel');

// DASHBOARD
Route::prefix('dashboard')->middleware('can:team')->group(function () {
    Route::get('/', HomeDashboard::class)->name('d.home');
});


// AUTH
Route::get('/auth/login', function(){
    return Socialite::driver('google')->redirect();
});
Route::get('/auth/callback', GoogleLogin::class);


// require __DIR__.'/auth.php';
