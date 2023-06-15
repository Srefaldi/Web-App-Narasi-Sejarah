<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\StartController;


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


// Landing Page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home.index');


// Login dan Register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_proses', [LoginController::class, 'login_proses'])->name('login-proses');


Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Materi

Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::match(['get', 'post'], '/materi-store', [MateriController::class, 'store'])->name('materi.store');
Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');
Route::put('/materi/{id}', [MateriController::class, 'update'])->name('materi.update');
Route::get('/readmore/materi/{id}', [MateriController::class, 'readmore'])->name('readmore.materi');


// Kuis CRUD
Route::get('/kuis/mulaikuis', [KuisController::class, 'index'])->name('kuis.index');
Route::post('/kuis/mulaikuis', [KuisController::class, 'store'])->name('mulaikuis.store');
Route::delete('/mulaikuis/delete/{id}', [KuisController::class, 'destroy'])->name('mulaikuis.destroy');
Route::get('layout/quis', [KuisController::class, 'index'])->name('menu.quis');
Route::put('/mulaikuis/{id}', [KuisController::class, 'update'])->name('mulaikuis.update');

// Kuis Mulai
Route::get('/kuis', [StartController::class, 'index'])->name('mulai.rules');
Route::get('/kuis', [StartController::class, 'startkuis'])->name('mulai.kuis');

// leaderboard
// Route::get('/kuis/startkuis', [KuisController::class, 'startkuis'])->name('startkuis');
// Route::post('/kuis/leaderboardinsert', [KuisController::class, 'store_leaderboard'])->name('store.leaderboard');
// Route::get('/kuis/leaderboard', [KuisController::class, 'viewleaderboard'])->name('leaderboard');
