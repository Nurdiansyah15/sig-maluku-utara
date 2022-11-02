<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FaskesController;
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
Route::get('/data/json', [FaskesController::class, 'data']);

Route::get('/aduan', [AduanController::class, 'index']);
Route::post('/aduan', [AduanController::class, 'aduan']);

Route::get('/fasilitas', [FaskesController::class, 'fasilitas']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'register_action']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login_action']);
Route::get('/logout', [AuthController::class, 'logout']);
