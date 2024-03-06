<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'role:admin'])->group(function () {
    
    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('/dashboard/categories/edit/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/dashboard/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('category.delete');

    Route::get('/dashboard/user', [AdminController::class, 'index'])->name('user.index');
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:client'])->group( function(){
    
    Route::get('/client/index', [ClientController::class, 'index'])->name('client.index');

});

Route::middleware(['auth', 'role:organiser'])->group( function(){

    Route::get('/organisateur/index', [OrganisateurController::class, 'index'])->name('organisateur.index');
    
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
