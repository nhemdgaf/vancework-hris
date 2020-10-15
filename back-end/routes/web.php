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


// Route::get('admin/employee/create', function(){
//     return view('admin.employees.create');
// });

// Admin Index
Route::get('/admin', function () {
    return view('admin/index');
})->name('admin');


/*
    DTR
*/
Route::get('/dtr', 'DtrController@index')->name('dtr.admin');
Route::post('/dtr-parseImport', 'DtrController@parseImport')->name('dtr.parseImport');
Route::post('/dtr-processImport', 'DtrController@processImport')->name('dtr.processImport');
Route::post('/dtr-saveCutOff', 'DtrController@saveCutOffPeriod')->name('dtr.saveCutOff');
Route::post('/dtr-deleteDtrs', 'DtrController@deleteDtrs')->name('dtr.deleteDtrs');
// Route::get('/dtr-summary', 'DtrContoller@fetchDtrSummary')->name('dtr.summary');

/*
    PAYROLL
*/
Route::get('/payroll', 'PayrollController@index')->name('payroll.admin');
Route::post('/fetch-stores', 'PayrollController@showStores')->name('payroll.showStores');
Route::post('/process-summary', 'PayrollController@processSummary')->name('payroll.processSummary');


/*
    EMPLOYEE
*/

// Employee Index
Route::get('/employees', 'EmployeeController@index')->name('employees.admin');

// Employee Creation
// Request createStep1 function. See EmployeeController.php on app/http/Controllers
Route::get('/employees/create-step-1', 'EmployeeController@createStep1')->name('employees.create-1');
// Request post request from EmployeeController @ PostcreateStep1 function
Route::post('/employees/create-step-1', 'EmployeeController@PostcreateStep1');

Route::get('/employees/create-step-2', 'EmployeeController@createStep2')->name('employees.create-2');
Route::post('/employees/create-step-2', 'EmployeeController@PostcreateStep2');

Route::get('/employees/create-step-3', 'EmployeeController@createStep3')->name('employees.create-3');
Route::post('/employees/create-step-3', 'EmployeeController@PostcreateStep3');

Route::get('/employees/create-step-4', 'EmployeeController@createStep4')->name('employees.create-4');
Route::post('/employees/create-step-4', 'EmployeeController@PostcreateStep4');

Route::get('/employees/create-step-5', 'EmployeeController@createStep5')->name('employees.create-5');
Route::post('/employees/create-step-5', 'EmployeeController@PostcreateStep5');

Route::get('/employees/create-step-6', 'EmployeeController@createStep6')->name('employees.create-6');
Route::post('/employees/create-step-6', 'EmployeeController@PostcreateStep6');

Route::get('/employees/create-step-7', 'EmployeeController@createStep7')->name('employees.create-7');
Route::post('/employees/create-step-7', 'EmployeeController@PostcreateStep7');

Route::get('/employees/create-step-8', 'EmployeeController@createStep8')->name('employees.create-8');

// Store data in the database
Route::post('/employees', 'EmployeeController@store')->name('employees.store');

// Show Employee Information
Route::get('/employees/{employee}', 'EmployeeController@show')->name('employees.show');
