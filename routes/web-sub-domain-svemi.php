<?php

Route::domain(env('APP_DOMAIN_SVEMI'))->group(function () {
    Route::group(['namespace'=>'Svemi'], function() {
        Route::get('/', 'SvemiController@index')->name('svemi.index');
    });
});