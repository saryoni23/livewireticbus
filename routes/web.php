<?php

use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\Controller;
use App\Livewire\Berita\BeritaIndex;
use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Rute\RuteIndex;
use App\Livewire\Service\ServiceIndex;
use App\Livewire\Tiket\TiketIndex;
use App\Livewire\Transaksi\TransaksiIndex;
use App\Models\Berita;
use App\Models\Rute;
use App\Models\Service;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('admin')->middleware(['auth:sanctum','verified'])->name('admin.')->group
(function(){
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('berita', BeritaIndex::class)->name('berita.index');
    Route::get('kategori', KategoriIndex::class)->name('kategori.index');
    Route::get('rute', RuteIndex::class)->name('rute.index');
    Route::get('tiket', TiketIndex::class)->name('tiket.index');
    Route::get('transaksi', TransaksiIndex::class)->name('transaksi.index');
    // Route::get('service', ServiceIndex::class)->name('service.index');
});