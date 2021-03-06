<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontWebController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ServiceController;

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
//     return view('welcome');
// });

Route::get('/', [FrontWebController::class, 'index'] )->name('index');

Route::get('/machine-history/{machine_id}', [FrontWebController::class, 'machineHistory'] )
    ->name('machine-history');


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group( function () {

    Route::resource('machines', MachineController::class);

    Route::get('services/create/{id}', [ServiceController::class, 'create'])
        ->name('services.create');
    Route::resource('services', ServiceController::class)->except(['create']);

});    

