<?php

use App\Http\Livewire\C\GoogleLogin;
use App\Http\Livewire\S\Artikel;
use App\Http\Livewire\S\Home;
use App\Http\Livewire\D\Home as HomeDashboard;
use App\Http\Livewire\D\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

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
Route::prefix('dashboard')->middleware(['auth','can:team'])->group(function () {
    Route::get('/', HomeDashboard::class)->name('d.home');
    Route::get('/user', User::class)->name('d.user');
});


// AUTH
Route::get('/auth/login', function(){
    session(['page_login'=> url()->previous()]);
    return Socialite::driver('google')->redirect();
})->name('auth.login');
Route::get('/auth/callback', GoogleLogin::class);
Route::post('/auth/logout', function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(route('home'));
})->name('auth.logout');

// require __DIR__.'/auth.php';
