<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TicketController;

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
        return view('welcome');
    });


   Route::get('/tickets', [TicketController::class, 'index'])->name('ticket.index');
   Route::get('/tickets/create', [TicketController::class, 'create'])->name('ticket.create');
   Route::get('/tickets/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
   Route::post('/tickets/store', [TicketController::class, 'store'])->name('ticket.store');


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
 //        'phpVersion' => PHP_VERSION,
 //    ]);
 //});

 //Route::get('/dashboard', function () {
 //    return Inertia::render('Dashboard');
 //})->middleware(['auth', 'verified'])->name('dashboard');

 //Route::middleware('auth')->group(function () {
 //    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 //    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 //    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 //});

 //require __DIR__.'/auth.php';
