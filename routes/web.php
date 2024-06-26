<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Models\Lead;

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

//HOME PAGE ROUTE
Route::get('/', function () {
    return view('welcome');
});


Route::get('/mailable', function () {
    $lead = [
        'name' => 'Luca',
        'email' => 'luca@example.com',
        'message' => 'hello'
    ];
    $lead = Lead::find(1)->get();
    return new App\Mail\NewLeadMessage($lead);
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/portfolio', ProjectController::class)->parameters([
        'portfolio' => 'project:slug'
        /* ROUTE */ /*  ITEM PROPERTY */
    ]);
});


//AUTHENTICATION ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
