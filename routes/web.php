<?php

use App\Http\Controllers\ArtikelWriter as ControllersArtikelWriter;
use App\Http\Livewire\C\GoogleLogin;
use App\Http\Livewire\D\Admin\Writer;
use App\Http\Livewire\D\ArtikelAdmin;
use App\Http\Livewire\D\ArtikelSupervisor;
use App\Http\Livewire\D\ArtikelWriter;
use App\Http\Livewire\D\ArtikelWriterCreate;
use App\Http\Livewire\S\Artikel;
use App\Http\Livewire\S\Home;
use App\Http\Livewire\D\Home as HomeDashboard;
use App\Http\Livewire\D\Kategori;
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


// DASHBOARD
Route::prefix('dashboard')->middleware(['auth','can:team'])->group(function () {
    Route::get('/', HomeDashboard::class)->name('d.home');
    Route::get('/user', User::class)->name('d.user')->middleware('can:admin');
    Route::get('/kategori', Kategori::class)->name('d.kategori')->middleware('can:admin');
    Route::get('/artikel-admin', ArtikelAdmin::class)->name('d.artikel.admin')->middleware('can:admin');
    Route::get('/artikel-supervisor', ArtikelSupervisor::class)->name('d.artikel.supervisor')->middleware('can:supervisor');
    Route::get('/artikel-writer', ArtikelWriter::class)->name('d.artikel.writer')->middleware('can:writer');
    Route::get('/artikel-writer-create', ArtikelWriterCreate::class)->name('d.artikel.writer.create')->middleware('can:writer');
    Route::post('/artikel-writer', [ControllersArtikelWriter::class, 'store'])->name('d.artikel.writer.store')->middleware('can:writer');


    Route::prefix('admin')->middleware('can:admin')->group(function (){
        Route::get('writer', Writer::class)->name('d.admin.writer');
    });
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


// ARTIKEL
Route::get('/{slug}', Artikel::class)->name('artikel');

// require __DIR__.'/auth.php';
