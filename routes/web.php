<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\GeologistController;


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
    Route::delete('/geologists/{geologist}', [GeologistController::class, 'deleteGeologist'])->name('geologists.destroy');
    // Route::put('/geologists', [GeologistController::class, 'updateRole'])->name('updateRole');


});
    //

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/admin', function () {
//         return view('template/adminDashboard/layout/index');
//     })->name('admin');

//     Route::get('/admin/dashboard', function () {
//         return view('template/adminDashboard/contents/dashboard');
//     })->name('admin_dashboard');
// });
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:admin' // Only users with the 'admin' role can access these routes
])->group(function () {
    Route::get('/admin', function () {
        return view('template/adminDashboard/layout/index');
    })->name('admin');

    Route::get('/admin/dashboard', function () {
        return view('template/adminDashboard/contents/dashboard');
    })->name('admin_dashboard');
    Route::put('/update-role', [AdminController::class, 'updateRole'])->name('updateRole');
    Route::get('/manage', [GeologistController::class,'index'])->name('manage');

    Route::get('/kanban', [TaskController::class,'index'])->name('kanban');
    Route::delete('/geologists/{geologist}', [GeologistController::class, 'deleteGeologist'])->name('geologists.destroy');
    // Route::get('/weather', 'WeatherController@fetchWeatherData')->name('weather');
    // Route::get('/weather', [WeatherController::class,'fetchWeatherData'])->name('weather');
    Route::get('/weather', [WeatherController::class,'index'])->name('weather');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    // Route::get('/get-users-by-role/{roleId}', function($roleId) {
    //     $users = App\User::whereHas('roles', function($query) use ($roleId) {
    //         $query->where('id', $roleId);
    //     })->get();

    //     return response()->json($users);
    // });

    Route::get('/get-users-by-role/{roleId}', [GeologistController::class,'getUsersByRole']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:geologist' // Only users with the 'geologist' role can access these routes
])->group(function () {
    Route::get('/geologist', function () {
        return view('template/geologistDashboard/layout/index');
    })->name('geologist');

    Route::get('/geologist/dashboard', function () {
        return view('template/geologistDashboard/contents/dashboard');
    })->name('geologist_dashboard');

    // Add more routes for the 'geologist' role here
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:geologist' // Only users with the 'admin' role can access these routes
])->group(function () {
    Route::get('/geologist', function () {
        return view('template/geologistDashboard/layout/index');
    })->name('geologist');

});


// Route::prefix('admin')->middleware('auth')->group(function () {
//     Route::post('/geologists', [GeologistController::class, 'createGeologist'])->name('geologists.create');
//     Route::get('/geologists/{id}', [GeologistController::class, 'readGeologist'])->name('geologists.read');
//     Route::put('/geologists/{id}', [GeologistController::class, 'updateGeologist'])->name('geologists.update');
//     Route::delete('/geologists/{id}', [GeologistController::class, 'deleteGeologist'])->name('geologists.delete');
// });
