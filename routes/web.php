<?php

use App\Http\Controllers\ArtikelWriter as ControllersArtikelWriter;
use App\Http\Livewire\C\GoogleLogin;
use App\Http\Livewire\D\Admin\Writer;
use App\Http\Livewire\D\Admin\Artikel as ArtikelAdmin;
use App\Http\Livewire\D\Supervisor\Artikel as ArtikelSupervisor;
use App\Http\Livewire\D\Writer\ArtikelEditor;
use App\Http\Livewire\S\Artikel;
use App\Http\Livewire\S\Home;
use App\Http\Livewire\D\Home as HomeDashboard;
use App\Http\Livewire\D\Admin\User;
use App\Http\Livewire\D\Artikel as ArtikelDashboard;
use App\Http\Livewire\S\DaftarArtikel;
use App\Http\Livewire\S\Explore;
use App\Http\Livewire\S\NewRelease;
use App\Http\Livewire\S\Trending;
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
Route::get('/explore', Explore::class)->name('explore');

Route::get('/explore/{nama}', DaftarArtikel::class)->name('exploreByKategori');
Route::get('trending', Trending::class)->name('trending');
Route::get('new-release', NewRelease::class)->name('new-release');



// DASHBOARD
Route::prefix('dashboard')->middleware(['auth','can:team'])->group(function () {
    Route::get('/', HomeDashboard::class)->name('d.home');
    Route::get('/artikel', ArtikelDashboard::class)->name('d.artikel');

    Route::prefix('admin')->middleware('can:admin')->group(function (){
        Route::get('user', User::class)->name('d.admin.user');
        Route::get('writer', Writer::class)->name('d.admin.writer');
        // Route::get('kategori', Kategori::class)->name('d.admin.kategori');
        Route::get('artikel', ArtikelAdmin::class)->name('d.admin.artikel');
    });
    Route::prefix('writer')->middleware('can:writer')->group(function (){
        Route::get('artikel-editor/{id}', ArtikelEditor::class)->name('d.writer.artikel.editor');
        Route::post('artikel-store', [ControllersArtikelWriter::class, 'store'])->name('d.writer.artikel.store');
    });
    Route::prefix('supervisor')->middleware('can:supervisor')->group(function (){
        Route::get('artikel', ArtikelSupervisor::class)->name('d.supervisor.artikel');
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


Route::get('/tes', function(){
    return view('tes');
});
// ARTIKEL
Route::get('/{slug}', Artikel::class)->name('artikel');

// require __DIR__.'/auth.php';

