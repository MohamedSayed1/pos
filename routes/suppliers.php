<?php


Route::group(['middleware' => ['CheckAuth']], function () {

    Route::prefix('dashboard/suppliers')->group(function () {
        Route::namespace('Suppliers')->group(function () {

            Route::get('/', 'SuppliersControllers@index');
            Route::post('/', 'SuppliersControllers@search');
            Route::post('/add', 'SuppliersControllers@add');
            Route::get('/updated/{id}', 'SuppliersControllers@updatedView');
            Route::post('/updated', 'SuppliersControllers@updatedProces');


        });
    });
});