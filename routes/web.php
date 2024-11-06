<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\User\UserController;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Auth;

// Home page route
Route::get('/', [HomeController::class, 'index']);

// Protected routes with middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

// Redirect route
Route::get('/redirect', [HomeController::class, 'redirect']);

Route::get('/redirected', [HomeController::class, 'redirected']);

Route::get('/view_members', [AdminController::class, 'view_members']);

Route::get('/member_registration', [HomeController::class, 'member_registration']);

Route::get('/see_users', [AdminController::class, 'see_users']);

Route::post('/add_members', [AdminController::class, 'add_members']);

Route::post('/add_givings', [AdminController::class, 'add_givings']);

Route::get('/time_management', [AdminController::class, 'time_management']);

Route::get('/weekly_schedule', [AdminController::class, 'weekly_schedule']);

Route::get('/update_schedule', [AdminController::class, 'update_schedule']);

Route::get('/view_schedule/{id}', [adminController::class, 'view_schedule'])->name('view_schedule');

Route::get('/view_event/{id}', [adminController::class, 'view_event'])->name('view_event');

Route::get('/show_schedule}', [AdminController::class, 'view_schedule']);

Route::post('/add_schedule', [AdminController::class, 'add_schedule']);

Route::post('/add_event', [AdminController::class, 'add_event']);

Route::get('/insert_event', [AdminController::class, 'insert_event']);

Route::get('/insert_schedule', [AdminController::class, 'insert_schedule']);

Route::get('/delete_schedule/{id}', [AdminController::class, 'delete_schedule']);

Route::get('/view_givings', [AdminController::class, 'view_givings']);

Route::get('/member_givings', [HomeController::class, 'member_givings']);

Route::get('/see_givings', [AdminController::class, 'see_givings']);

Route::get('/see_members', [AdminController::class, 'see_members']);

Route::get('/delete_members/{id}', [AdminController::class, 'delete_members']);

Route::get('/delete_givers/{id}', [AdminController::class, 'delete_givers']);

Route::get('/delete_users/{id}', [AdminController::class, 'delete_users']);

Route::get('/view_inventory', [AdminController::class, 'view_inventory']);

Route::post('/add_inventory', [AdminController::class, 'add_inventory']);

Route::get('/show_inventory', [AdminController::class, 'show_inventory']);

Route::get('/delete_inventory/{id}', [AdminController::class, 'delete_inventory']);

Route::get('/update_member/{id}', [AdminController::class, 'update_member']);

Route::post('/update_registered/{id}', [AdminController::class, 'update_registered']);

Route::post('/update_users/{id}', [AdminController::class, 'update_users']);

Route::get('/update_user/{id}', [AdminController::class, 'update_user']);

Route::get('/update_inventory/{id}', [AdminController::class, 'update_inventory']);

Route::post('/update_equipment/{id}', [AdminController::class, 'update_equipment']);

//Human Resource Manager
Route::get('/payroll', [AdminController::class, 'payroll']);
Route::get('/ewallet', [AdminController::class, 'ewallet']);
Route::get('/human_resource', [AdminController::class, 'human_resource']);
Route::get('/employee', [AdminController::class, 'employee']);
Route::get('/add_employee', [AdminController::class, 'add_employee']);
Route::get('/edit_employee', [AdminController::class, 'edit_employee']);
Route::get('/payments', [AdminController::class, 'payments']);
Route::get('/deposit', [AdminController::class, 'deposit']);
Route::get('/create_employee', [AdminController::class, 'create_employee']);
Route::get('/depositamount', [AdminController::class, 'depositamount']);
Route::get('/update_employee/{id}', [AdminController::class, 'update_employee']);
// web.php
Route::post('/pay_employee', [AdminController::class, 'payEmployee']);
Route::get('/delete_employees/{id}', [AdminController::class, 'delete_employees']);
Route::get('/employeetoshow', [AdminController::class, 'index']);
Route::get('/projects', [AdminController::class, 'projects']);
Route::get('/addproject', [AdminController::class, 'addproject']);
Route::post('/createproject', [AdminController::class, 'createproject']);
Route::get('/editproject/{id}', [AdminController::class, 'editproject']);
Route::put('/updateproject/{id}', [AdminController::class, 'updateproject']);
Route::get('/deleteprojects/{id}', [AdminController::class, 'deleteprojects']);
