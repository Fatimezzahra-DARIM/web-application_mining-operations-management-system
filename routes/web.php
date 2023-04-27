<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\TaskFileController;
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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('template/adminDashboard/contents/dashboard');
//         // return view('dashboard');
//     })->name('dashboard');
//     // Route::get('/manage', function () {
//     //     return view('template/adminDashboard/contents/tableGeologists');
//     //     // return view('dashboard');
//     // })->name('manage');
//     Route::get('/manage', [GeologistController::class,'index'])->name('manage');
//     Route::delete('/geologists/{geologist}', [GeologistController::class, 'deleteGeologist'])->name('geologists.destroy');
//     // Route::put('/geologists', [GeologistController::class, 'updateRole'])->name('updateRole');


// });
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
    Route::get('/dashboard', function () {
        // dd('hi');
                return view('template/adminDashboard/contents/dashboard');
                // return view('dashboard');
            })->name('dashboard');
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
    Route::get('/weather', [WeatherController::class,'index'])->name('weather');

    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/get-users-by-role/{roleId}', [GeologistController::class,'getUsersByRole']);
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role:geologist|field-geologist|laboratory-geologist|office-geologist'
 // Only users with the 'geologist' role can access these routes
])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('template/adminDashboard/contents/dashboard');
    // })->name('admin_dashboard');

    Route::get('/geologist/dashboard', function () {
        return view('template/geologistDashboard/dashboard');
    })->name('geologist');
    Route::get('/task', [TaskController::class,'task'])->name('task');
    Route::get('/geologist', function () {
        return view('template/adminDashboard/layout/index');
    })->name('geologist');
    //Route of page about us
    Route::get('/geologist', function () {
        return view('template/geologistDashboard/about');
    })->name('about');
     //Routes of security rules of all geologist
    Route::get('/geologist/dashboard/f', function () {
        return view('template/geologistDashboard/fgeo');
    })->name('fgeologist_dashboard');

    Route::get('/geologist/dashboard/i', function () {
        return view('template/geologistDashboard/igeo');
    })->name('igeologist_dashboard');

    Route::get('/geologist/dashboard/l', function () {
        return view('template/geologistDashboard/lgeo');
    })->name('lgeologist_dashboard');
    //Routes of the activities and missions of all geologist

    Route::get('/geologist/dashboard/miss1', function () {
        return view('template/geologistDashboard/miss1');
    })->name('fmiss_dashboard');

    Route::get('/geologist/dashboard/miss2', function () {
        return view('template/geologistDashboard/miss2');
    })->name('lmiss_dashboard');
    Route::get('/geologist/dashboard/miss3', function () {
        return view('template/geologistDashboard/miss3');
    })->name('imiss_dashboard');
    Route::post('/files', [TaskFileController::class, 'store'])->name('files.store');
    Route::put('taskFile/{taskFile}', [TaskFileController::class, 'update'])->name('files.update');



});


// Route::get('/taskfile', [TaskFileController::class, 'index']);
