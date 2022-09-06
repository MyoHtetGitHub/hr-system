<?php

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

Auth::routes(['register' => false]);
Route::middleware('auth')->group(function () {
    Route::get('/', 'PageController@home');
    //for user routes
    Route::resource('employee', 'EmployeeController');
    Route::get('/employee/Datatables/getDatatableServerSide','EmployeeController@getDatatableServerSide');
    Route::get('/profile','ProfileController@profile')->name('profile.profile');
    // for department route
    Route::resource('/department', 'DepartmentController');
    Route::get('/department/Datatables/getDatatableServerSide','DepartmentController@getDatatableServerside');
    //for role
    Route::resource('role', 'RoleController');
    Route::get('/role/Datatables/getDatatableServerSide','RoleController@getDatatableServerside');
});
