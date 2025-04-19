<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;

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

Route::pattern('id', '[0-9]+'); // artinya ketika ada parameter {id}, maka harus berupa angka

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

// Route untuk registrasi
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postregister']);

Route::middleware(['auth'])->group(function () { // artinya semua route di dalam group ini harus login dulu
Route::get('/', [WelcomeController::class, 'index']);
// Tambahkan route berikut di file routes/web.php

Route::get('/profile', [App\Http\Controllers\UserProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/update-photo', [App\Http\Controllers\UserProfileController::class, 'updatePhoto'])->name('profile.update-photo');


// Route yang hanya bisa diakses oleh Administrator
Route::middleware(['auth', 'authorize:ADM'])->group(function () {
    // Level Management
    Route::get('/level', [LevelController::class, 'index']);
    Route::post('/level/list', [LevelController::class, 'list']);
    Route::get('/level/create', [LevelController::class, 'create']);
    Route::post('/level', [LevelController::class, 'store']);
    Route::get('/level/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/level/{id}', [LevelController::class, 'update']);
    Route::delete('/level/{id}', [LevelController::class, 'destroy']);

    Route::get('/level/import', [LevelController::class, 'import']);
    Route::post('/level/import_ajax', [LevelController::class, 'import_ajax']);
    Route::get('/level/export_excel', [LevelController::class, 'export_excel']);
    Route::get('/level/export_pdf', [LevelController::class, 'export_pdf']);
    
    // User Management
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user/list', [UserController::class, 'list']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);

    Route::get('/user/import', [UserController::class, 'import']);
    Route::post('/user/import_ajax', [UserController::class, 'import_ajax']);
    Route::get('/user/export_excel', [UserController::class, 'export_excel']);
    Route::get('/user/export_pdf', [UserController::class, 'export_pdf']);
});

// Route yang bisa diakses oleh Administrator dan Manager
Route::middleware(['auth', 'authorize:ADM,MNG'])->group(function () {
    // Barang Management
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang/list', [BarangController::class, 'list']);
    Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/barang_ajax', [BarangController::class, 'store_ajax']);
    Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
    Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']);
    Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
    Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);

    Route::get('/barang/import', [BarangController::class, 'import']);
    Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']);
    Route::get('/barang/export_excel', [BarangController::class, 'export_excel']);
    Route::get('/barang/export_pdf', [BarangController::class, 'export_pdf']);

    // Kategori Management
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/list', [KategoriController::class, 'list']);
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/kategori/import', [KategoriController::class, 'import']);
    Route::post('/kategori/import_ajax', [KategoriController::class, 'import_ajax']);
    Route::get('/kategori/export_excel', [KategoriController::class, 'export_excel']);
    Route::get('/kategori/export_pdf', [KategoriController::class, 'export_pdf']);
});


// // Route yang bisa diakses oleh Administrator, Manager, dan Staff
// Route::middleware(['auth', 'authorize:ADM,MNG,STF'])->group(function () {
//     // Stok Management
//     Route::get('/stok', [StokController::class, 'index']);
//     Route::post('/stok/list', [StokController::class, 'list']);
//     Route::get('/stok/create', [StokController::class, 'create']);
//     Route::post('/stok', [StokController::class, 'store']);
    
//     // Penjualan Management
//     Route::get('/penjualan', [PenjualanController::class, 'index']);
//     Route::post('/penjualan/list', [PenjualanController::class, 'list']);
//     Route::get('/penjualan/create', [PenjualanController::class, 'create']);
//     Route::post('/penjualan', [PenjualanController::class, 'store']);
//     Route::get('/penjualan/{id}', [PenjualanController::class, 'show']);
// });

// Route untuk User
Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
    Route::post('/ajax', [UserController::class, 'store_ajax']); // Menyimpan data user baru Ajax
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); // Untuk hapus data user Ajax
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

// Route untuk Level
Route::prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

// Route untuk Kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    Route::get('/{id}', [KategoriController::class, 'show']);
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/{id}', [KategoriController::class, 'update']);
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
    Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

// Route untuk Supplier
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

// Route untuk Barang
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/create_ajax', [BarangController::class, 'create_ajax']);
    Route::post('/ajax', [BarangController::class, 'store_ajax']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id}', [BarangController::class, 'update']);
    Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']);
    Route::delete('/{id}', [BarangController::class, 'destroy']);
});

});