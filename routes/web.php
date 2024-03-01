<?php

use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\Controller;
use App\Livewire\Berita\BeritaIndex;
use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Rute\RuteIndex;
use App\Livewire\Tiket\TiketIndex;
use App\Livewire\Tiketbeli\TiketbeliIndex;
use App\Livewire\Transaksi\TransaksiIndex;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return view('halaman_depan.layout.index');
// });




    Route::get('/',         [Controller::class, 'index'])->name('Home');
    Route::get('/blog',     [Controller::class, 'blog'])->name('Blog');
    Route::get('/blog/{id}',  [Controller::class, 'blogshow']);
    Route::get('/tiket',    [Controller::class, 'tiket'])->name('Tiket');
    Route::get('/company',  [Controller::class, 'company'])->name('Company');






Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    });


Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->middleware(['auth:sanctum','verified'])->name('admin.')->group (function(){
        Route::get('dashboard', [AdminDashboardController::class,   'index'])->name('dashboard')->middleware('userAkses:admin');
        // Route::get('/',         [RoleController::class,             'index'])->name('index')    ->middleware('userAkses:admin');
        Route::get('berita',    BeritaIndex::class                          )->name('berita')   ->middleware('userAkses:admin');
        Route::get('kategori',  KategoriIndex::class                        )->name('kategori') ->middleware('userAkses:admin');
        Route::get('rute',      RuteIndex::class                            )->name('rute')     ->middleware('userAkses:admin');
        Route::get('tiket',     TiketIndex::class                           )->name('tiket')    ->middleware('userAkses:admin');
        Route::get('transaksi', TransaksiIndex::class                       )->name('transaksi')->middleware('userAkses:admin');
        Route::get('tiketbeli', TiketbeliIndex::class                       )->name('tiketbeli')->middleware('userAkses:admin');
        // Route::get('kelolauser', KelolauserIndex::class                     )->name('kelolauser')->middleware('userAkses:admin');

    });
});

