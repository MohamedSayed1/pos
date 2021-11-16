<?php

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

    if (\Auth::check()) {
        return redirect()->back();
    }
    return view('login');
});

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/dashboard','HomeControllers@index')->middleware('CheckAuth');

Route::group(['middleware' => ['CheckAuth','CheckAdmin']], function () {






    Route::get('/test', 'test@index');

    Route::get('/test/open', function () {
        // \Helmesvs\Notify\Facades\Notify::success('تم الاضافه بنجاح', 'احسنت');
        return view('admin.session.test');
    });


    Route::prefix('dashboard/users')->group(function () {
        Route::namespace('Users')->group(function () {
            // Controllers Within The "App\Http\Controllers\users" Namespace

            Route::get('/', 'UsersControllers@index');
            Route::post('/', 'UsersControllers@updated');
            Route::post('/password', 'UsersControllers@updatedPassword');
        });
    });

    // reports

    Route::post('dashboard/reports/expenses', 'ReportsController@expensesReport');
    Route::get('dashboard/reports/expenses', 'ReportsController@expenses');

    Route::post('dashboard/reports/products', 'ReportsController@ProductReport');
    Route::get('dashboard/reports/export/excel/products', 'ReportsController@exportProudcts');

    Route::get('dashboard/reports/products', function () {
        return redirect('dashboard');
    });





});

Route::get('/test/ver', 'testinter@add');
