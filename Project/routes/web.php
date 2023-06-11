<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Models\quiz;

// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Login dan Register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login-proses');


Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// grup admin
// Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {




Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', [HomeController::class, 'index'])->name('user.index');


    // Dashboard User Admin

    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');

    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');




    // Materi
    // Route::prefix('materi')->group(function () {
    //     Route::get('/', [MateriController::class, 'index'])->name('materi.index');
    //     Route::get('/create', [MateriController::class, 'create'])->name('materi.create');
    //     Route::post('/store', [MateriController::class, 'store'])->name('materi.store');
    //     Route::get('/edit/{id}', [MateriController::class, 'edit'])->name('materi.edit');
    //     Route::post('/update/{id}', [MateriController::class, 'update'])->name('materi.update');
    //     Route::delete('/delete/{id}', [MateriController::class, 'delete'])->name('materi.delete');
    // });

    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::match(['get', 'post'], '/materi-store', [MateriController::class, 'store'])->name('materi.store');


    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
    Route::put('/materi/{id}', [MateriController::class, 'update'])->name('materi.update');
    Route::get('/readmore/materi/{id}', [MateriController::class, 'readmore'])->name('readmore.materi');



    // Kuis
    Route::get('/kuis/quiz', [KuisController::class, 'index'])->name('kuis.index');
    Route::post('/kuis/quiz', [KuisController::class, 'store'])->name('mulaikuis.store');
    Route::delete('/quiz/delete/{id}', [KuisController::class, 'destroy'])->name('mulaikuis.destroy');
    Route::get('layout/quiz', [KuisController::class, 'index'])->name('menu.quis');
    Route::put('/mulaikuis/{id}', [KuisController::class, 'update'])->name('mulaikuis.update');
});
