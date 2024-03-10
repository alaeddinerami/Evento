<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Models\Organisateur;
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
    Route::get('/dashboard/user/event', [AdminController::class, 'show'])->name('admin.show');
    Route::patch('/dashboard/client/ban/{client}', [ClientController::class, 'ban'])->name('client.ban');
    Route::patch('/dashboard/organisateur/ban/{organisateur}', [OrganisateurController::class, 'ban'])->name('organisateur.ban');
    
    Route::get('/dashboard', [AdminController::class, 'statistics'])->name('user.statistics');
    Route::put('/dashboarde/validateEvent/{event}', [AdminController::class, 'validateEvent'])->name('admin.validateEvent');
    Route::put('/dashboarde/rejectEvent/{event}', [AdminController::class, 'rejectEvent'])->name('admin.rejectEvent');
    Route::get('/dashboarde/visitEvent/{event}', [AdminController::class, 'visitEvent'])->name('admin.visitEvent');
    
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:client'])->group( function(){
    
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/search', [ClientController::class, 'search'])->name('client.search');
    Route::post('/client/filter', [ClientController::class, 'filter'])->name('client.filter');
    Route::get('/client/show/{event}', [EventController::class, 'show'])->name('clientevent.show');
    route::resource('/client/reservation',ReservationController::class);
    // route::resource('/client',ClientController::class);
    Route::get('/client/myreservation', [ClientController::class, 'myreservation'])->name('client.myreservation');
});

Route::middleware(['auth', 'role:organiser'])->group( function(){

    // Route::get('/organisateur/index', [OrganisateurController::class, 'index'])->name('organisateur.index');
    Route::resource('/organisateur/event',EventController::class);
    route::patch('/organisateur/reservation/{reservation}',[ReservationController::class,'reseravationManualAccepted'])->name('organisateur.reseravationManualAccepted');
    route::get('/organisateur/reservationDisplay',[ReservationController::class,'displayIndex'])->name('organisateur.displayIndex');
    route::get('/organisateur/showStatistic/{event}',[EventController::class,'showstatistic'])->name('organisateur.showstatistic');

});


// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
