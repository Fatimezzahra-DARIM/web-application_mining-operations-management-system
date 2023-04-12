<?php

use App\Http\Controllers\GeologistController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('template/adminDashboard/contents/dashboard');
        // return view('dashboard');
    })->name('dashboard');
    // Route::get('/manage', function () {
    //     return view('template/adminDashboard/contents/tableGeologists');
    //     // return view('dashboard');
    // })->name('manage');
    Route::get('/manage', [GeologistController::class,'index'])->name('manage');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/admin', function () {
        return view('template/adminDashboard/layout/index');
    })->name('admin');

    Route::get('/admin/dashboard', function () {
        return view('template/adminDashboard/contents/dashboard');
    })->name('admin_dashboard');
});




// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::post('/geologists', [GeologistController::class, 'createGeologist'])->name('geologists.create');
//     Route::get('/geologists/{id}', [GeologistController::class, 'readGeologist'])->name('geologists.read');
//     Route::put('/geologists/{id}', [GeologistController::class, 'updateGeologist'])->name('geologists.update');
//     Route::delete('/geologists/{id}', [GeologistController::class, 'deleteGeologist'])->name('geologists.delete');
// });
