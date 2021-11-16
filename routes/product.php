<?php


Route::group(['middleware' => ['CheckAuth','CheckAdmin']], function () {

    Route::prefix('dashboard/products')->group(function () {
        Route::namespace('Products')->group(function () {
            // Controllers Within The "App\Http\Controllers\Products" Namespace

            Route::get('/', 'ProductsController@index');

            Route::post('/', 'ProductsController@add');
            Route::get('/search', 'ProductsController@index');
            Route::post('/search', 'ProductsController@search');
            Route::get('/get/{id?}', 'ProductsController@updatedView');
            Route::post('/get', 'ProductsController@updatedProces');


        });
    });
});
