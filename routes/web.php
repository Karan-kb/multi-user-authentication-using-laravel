<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::get('post',[HomeController::class,'post'])->middleware(['auth','admin']);

Route::get('/adminhome', [HomeController::class, 'adminhome'])->middleware(['auth','admin'])->name('admin.adminhome');


Route::delete('/{user}', [HomeController::class, 'destroy'])->middleware(['auth','admin'])->name('users.destroy');

Route::get('/edit/{user}', [HomeController::class, 'edit'])->middleware(['auth','admin'])->name('users.edit');

Route::post('/update/{user}', [HomeController::class, 'update'])->middleware(['auth','admin'])->name('users.update');