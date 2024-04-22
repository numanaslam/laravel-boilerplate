<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FundsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/register', function () {
//     return view('admin.users.register');
// });
Route::get('/theme', function () {
    return view('admin.users.home');
});

Route::get('/register', [UserController::class, 'register']);
Route::post('user/store', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('user/validation', [UserController::class, 'validation']);

Route::middleware(['auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index']);







    Route::get('roles', [RolesController::class, 'index']);
    Route::get('roles/datatable', [RolesController::class, 'datatable']);
    Route::get('roles/add', [RolesController::class, 'add']);
    Route::post('roles/store', [RolesController::class, 'store']);
    Route::get('roles/edit/{id}', [RolesController::class, 'edit']);
    Route::post('roles/edit_store/{id}', [RolesController::class, 'edit_store']);
    Route::get('roles/delete/{id}', [RolesController::class, 'delete']);

    Route::get('permissions', [PermissionsController::class, 'index']);
    Route::get('permissions/datatable', [PermissionsController::class, 'datatable']);
    Route::get('permissions/add', [PermissionsController::class, 'add']);
    Route::post('permissions/store', [PermissionsController::class, 'store']);
    Route::get('permissions/edit/{id}', [PermissionsController::class, 'edit']);
    Route::post('permissions/edit_store/{id}', [PermissionsController::class, 'edit_store']);
    Route::get('permissions/delete/{id}', [PermissionsController::class, 'delete']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('users/datatable', [UserController::class, 'datatable']);
    Route::get('users/add', [UserController::class, 'add']);
    Route::post('users/addUser', [UserController::class, 'addUser']);
    Route::get('users/edit/{id}', [UserController::class, 'edit']);
    Route::post('users/edit_store/{id}', [UserController::class, 'edit_store']);
    Route::get('users/delete/{id}', [UserController::class, 'delete']);
    Route::get('users/profile/{id}', [UserController::class, 'profile']);
    Route::get('users/settings/{id}', [UserController::class, 'settings']);

    Route::get('categories', [CategoriesController::class, 'index']);
    Route::get('categories/datatable', [CategoriesController::class, 'datatable']);
    Route::get('categories/add', [CategoriesController::class, 'add']);
    Route::post('categories/store', [CategoriesController::class, 'store']);
    Route::get('categories/edit/{id}', [CategoriesController::class, 'edit']);
    Route::post('categories/edit_store/{id}', [CategoriesController::class, 'edit_store']);
    Route::get('categories/delete/{id}', [CategoriesController::class, 'delete']);


    Route::get('services', [ServicesController::class, 'index']);
    Route::get('services/datatable', [ServicesController::class, 'datatable']);
    Route::get('services/add', [ServicesController::class, 'add']);
    Route::post('services/store', [ServicesController::class, 'store']);
    Route::get('services/edit/{id}', [ServicesController::class, 'edit']);
    Route::post('services/edit_store/{id}', [ServicesController::class, 'edit_store']);
    Route::get('services/delete/{id}', [ServicesController::class, 'delete']);

    Route::get('funds', [FundsController::class, 'index']);
    Route::get('funds/datatable', [FundsController::class, 'datatable']);
    Route::get('funds/add', [FundsController::class, 'add']);
    Route::post('funds/store', [FundsController::class, 'store']);
    Route::get('funds/edit/{id}', [FundsController::class, 'edit']);
    Route::post('funds/edit_store/{id}', [FundsController::class, 'edit_store']);
    Route::get('funds/delete/{id}', [FundsController::class, 'delete']);
    Route::get('funds/details/{id}', [FundsController::class, 'details']);

    Route::get('orders', [OrdersController::class, 'index']);
    Route::get('orders/datatable', [OrdersController::class, 'datatable']);
    Route::get('orders/add', [OrdersController::class, 'add']);
    Route::post('orders/store', [OrdersController::class, 'store']);
    Route::get('orders/edit/{id}', [OrdersController::class, 'edit']);
    Route::post('orders/edit_store/{id}', [OrdersController::class, 'edit_store']);
    Route::get('orders/delete/{id}', [OrdersController::class, 'delete']);

});
