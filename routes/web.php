<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\UserController;
use App\Models\Pelanggan;
use App\Models\Pakaian;
use App\Models\Laundry;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('auth.login');
});

Route::middleware('auth')->group(function (){

    //Dashboard
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

    //User Profile
    // Route::get('user/profile', [UserController::class, 'edit'])->name('user.profile');
    // Route::put('user/update', [UserController::class, 'update'])->name('user.update');

    //Pelanggan
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan/post', [PelangganController::class, 'store'])->name('pelanggan.post');
    Route::get("pelanggan/edit/{id}", [Pelanggancontroller::class, 'edit'])->name('pelanggan.edit');
    Route::put("pelanggan/update", [Pelanggancontroller::class, 'update'])->name('pelanggan.update');
    Route::get("pelanggan/delete/{id}", [Pelanggancontroller::class, 'delete'])->name('pelanggan.delete');
    Route::get('pelanggan/show/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');

    //Pakaian
    Route::get('pakaian', [PakaianController::class, 'index'])->name('pakaian');
    Route::get('pakaian/create', [PakaianController::class, 'create'])->name('pakaian.create');
    Route::post('pakaian/post', [PakaianController::class, 'store'])->name('pakaian.post');
    Route::get("pakaian/edit/{id}", [PakaianController::class, 'edit'])->name('pakaian.edit');
    Route::put("pakaian/update", [PakaianController::class, 'update'])->name('pakaian.update');
    Route::get("pakaian/delete/{id}", [PakaianController::class, 'delete'])->name('pakaian.delete');

    //Laundry
    Route::get('laundry', [LaundryController::class, 'index'])->name('laundry');
    Route::get('laundry/create', [LaundryController::class, 'create'])->name('laundry.create');
    Route::post('laundry/post', [LaundryController::class, 'store'])->name('laundry.post');
    Route::get('laundry/pdf', [LaundryController::class, 'cetakPdf'])->name('cetak.pdf');
    Route::get('laundry/delete/{id}', [LaundryController::class, 'delete'])->name('laundry.delete');

});

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

//Register
Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');

//Login
Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');

//LogOut
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');