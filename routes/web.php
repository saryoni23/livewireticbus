<?php

use App\Http\Controllers\Admins\AdminDashboardController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Livewire\Berita\BeritaIndex;
use App\Livewire\Carosel\CaroselIndex;
use App\Livewire\Kategori\KategoriIndex;
use App\Livewire\Rute\RuteIndex;
use App\Livewire\Tiket\TiketIndex;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');

Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');


Route::get('/language/{locale}', function ($locale) {
    if (array_key_exists($locale, config('app.supported_locales'))) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('locale');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});





// Route::middleware(['guest'])->group(function(){



//     Route::get('/',         [Controller::class, 'index'])->name('Home');
//     Route::get('/blog',     [Controller::class, 'blog'])->name('Blog');
//     Route::get('/blog/{id}',  [Controller::class, 'blogshow']);
//     Route::get('/tiket',    [Controller::class, 'tiket'])->name('Tiket');
//     Route::get('/company',  [Controller::class, 'company'])->name('Company');


// });



// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
//     Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
//     });


// Route::redirect('admin','dashboard');
// Route::middleware(['auth'])->group(function(){
//     Route::prefix('admin')->middleware(['auth:sanctum','verified'])->name('admin.')->group (function(){
//         Route::get('dashboard', [AdminDashboardController::class,   'index'])->name('dashboard')->middleware('userAkses:admin');
//         // Route::get('/',         [RoleController::class,             'index'])->name('index')    ->middleware('userAkses:admin');
//         Route::get('berita',    BeritaIndex::class                          )->name('berita')   ->middleware('userAkses:admin');
//         Route::get('kategori',  KategoriIndex::class                        )->name('kategori') ->middleware('userAkses:admin');
//         Route::get('rute',      RuteIndex::class                            )->name('rute')     ->middleware('userAkses:admin');
//         Route::get('tiket',     TiketIndex::class                           )->name('tiket')    ->middleware('userAkses:admin');
//         Route::get('transaksi', TransaksiIndex::class                       )->name('transaksi')->middleware('userAkses:admin');
//         Route::get('carosel',   CaroselIndex::class                         )->name('carosel')  ->middleware('userAkses:admin');
//         // Route::get('kelolauser', KelolauserIndex::class                     )->name('kelolauser')->middleware('userAkses:admin');

//     });
// });


// Route::redirect('karyawan','dashboard');
// Route::middleware(['auth'])->group(function(){
//     Route::prefix('karyawan')->middleware(['auth:sanctum','verified'])->name('karyawan.')->group (function(){
//         Route::get('dashboard', [AdminDashboardController::class,   'index'])->name('dashboard')->middleware('userAkses:karywan');
//         // Route::get('/',         [RoleController::class,             'index'])->name('index')    ->middleware('userAkses:karywan');
//         Route::get('berita1',     BeritaIndex::class                          )->name('berita1')   ->middleware('userAkses:karywan');
//         Route::get('transaksi1',     TransaksiIndex::class                       )->name('transaksi1')->middleware('userAkses:karywan');
//         Route::get('carosel1',       CaroselIndex::class                         )->name('carosel1')  ->middleware('userAkses:karywan');
//         // Route::get('kelolauser', KelolauserIndex::class                     )->name('kelolauser')->middleware('userAkses:karywan');

//     });
// });
