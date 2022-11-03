<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FaskesController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ListaduanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     $data = Faskes::all();
//     return view('user.home', [
//         'data' => $data
//     ]);
// });

Route::get('/', [FaskesController::class, 'index'])->name('dashboard');
Route::get('/fasilitas', [FaskesController::class, 'fasilitas']);
Route::get('/fasilitas/json', [FaskesController::class, 'data']);
Route::get('/fasilitas/tambah', [FaskesController::class, 'tambah']);
Route::post('/fasilitas/tambah', [FaskesController::class, 'tambah_action']);
Route::get('/fasilitas/edit/{id}', [FaskesController::class, 'edit']);
Route::post('/fasilitas/edit/{id}', [FaskesController::class, 'edit_action']);

Route::get('/aduan', [AduanController::class, 'index']);
Route::post('/aduan', [AduanController::class, 'aduan']);

<<<<<<< HEAD
=======
Route::get('/kontak', [KontakController::class, 'index']);

Route::get('/user', [UserController::class, 'index']);

Route::get('/fasilitas', [FaskesController::class, 'fasilitas']);
>>>>>>> 947656d4bed0b325210dcc9562c78c4f5a4b59b2

Route::get('/list_aduan', [ListaduanController::class, 'index']);
Route::delete('/list_aduan/{aduan}', [ListaduanController::class, 'destroy']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_action']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_action']);
Route::get('/logout', [AuthController::class, 'logout']);
