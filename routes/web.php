<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\WebAuthnRegisterController;
use App\Http\Controllers\Auth\WebAuthnLoginController;

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

//for biometric authentication
Route::post('webauthn/register/options', [WebAuthnRegisterController::class, 'options'])
     ->name('webauthn.register.options');
Route::post('webauthn/register', [WebAuthnRegisterController::class, 'register'])
     ->name('webauthn.register');

Route::post('webauthn/login/options', [WebAuthnLoginController::class, 'options'])
     ->name('webauthn.login.options');
Route::post('webauthn/login', [WebAuthnLoginController::class, 'login'])
     ->name('webauthn.login');

Auth::routes(['register' => false]);
Route::get('/login-option','Auth\LoginController@loginOption')->name('login-option');
Route::middleware('auth')->group(function () {
    Route::get('/', 'PageController@home');

    //for user routes
    Route::resource('employee', 'EmployeeController');
    Route::get('/employee/Datatables/getDatatableServerSide','EmployeeController@getDatatableServerSide');
    Route::get('/profile','ProfileController@profile')->name('profile.profile');
    Route::delete('profile/biometric-data-delete/{id}','ProfileController@biometricDestroy');

    // for department route
    Route::resource('/department', 'DepartmentController');
    Route::get('/department/Datatables/getDatatableServerSide','DepartmentController@getDatatableServerside');

    //for role
    Route::resource('role', 'RoleController');
    Route::get('/role/Datatables/getDatatableServerSide','RoleController@getDatatableServerside');

    //for permission
    Route::resource('permission', 'PermissionController');
    Route::get('/permission/Datatables/getDatatableServerSide','PermissionController@getDatatableServerside');

    //for compancy setting
    Route::resource('compancy-setting', 'CompancySettingController')->only(['show','edit','update']);
});

    //for check-in check-out 
    Route::get('checkin-checkout','CheckInCheckOutController@checkInCheckOut');