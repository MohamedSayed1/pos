<?php

Route::group(['middleware' => ['CheckAuth','CheckAdmin']], function () {
    Route::prefix('dashboard/expenses')->group(function () {
        Route::namespace('Expenses')->group(function () {
            // Controllers Within The "App\Http\Controllers\Expenses" Namespace

            Route::get('/', 'SplitExpensesControlles@index');
            Route::post('/', 'SplitExpensesControlles@add');
            Route::get('/updated', 'SplitExpensesControlles@index');
            Route::post('/updated', 'SplitExpensesControlles@updated');

            Route::get('/record', 'ExpensesControllers@index');
            Route::get('/record/del/{id?}', 'ExpensesControllers@del');
            Route::post('/record', 'ExpensesControllers@add');
            Route::post('/record/updated', 'ExpensesControllers@updated');


        });
    });
});

