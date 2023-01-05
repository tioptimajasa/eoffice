<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\NodinController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\DashboardController;



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

Route::get('/', function () {
    if (Auth::id() == null) {
    return view('auth.login-v2');
    }
    return redirect()->route('dashboard');
});



/*-------  End Halaman Web ----------------- */



Route::get('/admin/login', function () {
    // return view('welcome');
    if (Auth::id() == null) {
        return view('auth.login-v2');
    }
    return redirect()->route('dashboard');
});










    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // User
        Route::get('/users', [UserController::class, 'index'])->name('user.index');
        Route::get('/users-create', [UserController::class, 'create'])->name('user.create');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::get('/users/{id}/show', [UserController::class, 'show'])->name('user.show');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/users/{id}/edit', [UserController::class, 'update'])->name('user.update');
        Route::get('/users/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
        // Route::get('/users',  [UserController::class, 'index'])->name('user.uploads');
        Route::post('/users-create',[UserController::class, 'store'])->name('user.image.store');



        // Roles
        Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
        Route::get('/roles-create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('role.store');
        Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/roles/{id}/edit', [RoleController::class, 'update'])->name('role.update');
        Route::get('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('role.destroy');


        //Struktur
        Route::get('/strukturs', [StrukturController::class, 'index'])->name('struktur.index');
        Route::get('/diagram-strukturs', [StrukturController::class, 'diagram'])->name('struktur.diagram');
        Route::get('/get-diagram-strukturs', [StrukturController::class, 'getdiagram'])->name('struktur.getdiagram');
        Route::get('/strukturs-create', [StrukturController::class, 'create'])->name('struktur.create');
        Route::get('/strukturs/{id}/edit', [StrukturController::class, 'edit'])->name('struktur.edit');
        Route::post('/strukturs/{id}/edit', [StrukturController::class, 'update'])->name('struktur.update');
        Route::post('/strukturs', [StrukturController::class, 'store'])->name('struktur.store');
        Route::get('/strukturs/{id}/delete', [StrukturController::class, 'destroy'])->name('struktur.destroy');



        // Nodin
        Route::get('/nodins', [NodinController::class, 'index'])->name('nodin.index');
        Route::get('/nodins-create', [NodinController::class, 'create'])->name('nodin.create');
        Route::post('/nodins', [NodinController::class, 'store'])->name('nodin.store');
        Route::get('/nodins/{id}/show', [NodinController::class, 'show'])->name('nodin.show');
        Route::get('/nodins/{id}/edit', [NodinController::class, 'edit'])->name('nodin.edit');
        Route::post('/nodins/{id}/edit', [NodinController::class, 'update'])->name('nodin.update');
        Route::get('/nodins/{id}/delete', [NodinController::class, 'destroy'])->name('nodin.destroy');
        Route::get('/nodinreport/{id}', [NodinController::class, 'nodinreport'])->name('nodin.report');
        Route::get('/cetaknodin/{id}', [NodinController::class, 'cetaknodin'])->name('nodin.cetaknodin');


        

        // Memo
        Route::get('/memos', [MemoController::class, 'index'])->name('memo.index');
        Route::get('/memos-create', [MemoController::class, 'create'])->name('memo.create');
        Route::post('/memos', [MemoController::class, 'store'])->name('memo.store');
        Route::get('/memos/{id}/edit', [MemoController::class, 'edit'])->name('memo.edit');
        Route::post('/memos/{id}/edit', [MemoController::class, 'update'])->name('memo.update');
        Route::get('/memos/{id}/delete', [MemoController::class, 'destroy'])->name('memo.destroy');
        Route::get('/memoreport/{id}', [MemoController::class, 'memoreport'])->name('memo.memoreport');
        Route::get('/cetakmemo', [MemoController::class, 'cetakmemo'])->name('memo.cetakmemo');




        //surat Masuk
        Route::get('/suratmasuk', [SuratmasukController::class, 'index'])->name('suratmasuk.index');
            



});

require __DIR__.'/auth.php';
