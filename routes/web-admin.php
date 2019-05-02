<?php

Route::group(['domain'	=>	env('APP_DOMAIN'), 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware'	=>	'admin'], function()
{
    Route::group(['namespace'=>'Site'], function()
    {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::resources([
            '/categories' => 'CategoriesController',
            '/tags' => 'TagsController',
            '/users' => 'UsersController',
            '/posts' => 'PostsController',
            '/countri' => 'CountrisController',
            '/city' => 'CitysController',
            '/subscribers' => 'SubscribersController',
            '/tag_desc' => 'TagDescsController'
        ]);

        Route::get('/posts/toggle/{id}', 'PostsController@toggle')->name('posts.toggle');
        Route::get('/comments', 'CommentsController@index')->name('comments.index');
        Route::get('/comments/toggle/{id}', 'CommentsController@toggle')->name('comments.toggle');
        Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
        Route::get('/comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
        Route::put('/comments/update', 'CommentsController@update')->name('comments.update');

        Route::post('/ajax/{id}', 'AjaxController@select')->name('select');
        Route::post('/ckeditor-upload-image', 'AjaxController@upload');
    });

    Route::group(['prefix'=>'vinograd','namespace'=>'Vinograd'], function()
    {
        Route::resources([
            '/products' => 'ProductsController',
            '/categorys' => 'CategorysController',
            '/sliders' => 'SlidersController'
        ]);
        Route::get('/products/toggle/{id}', 'ProductsController@toggle')->name('products.toggle');
        Route::post('/products/modification/add', 'ProductsController@modificationAdd')->name('products.modification.add');

        Route::get('/comments', 'CommentsController@index')->name('vinograd.comments.index');
        Route::get('/comments/toggle/{id}', 'CommentsController@toggle')->name('vinograd.comments.toggle');
        Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('vinograd.comments.destroy');
        Route::get('/comments/{id}/edit', 'CommentsController@edit')->name('vinograd.comments.edit');
        Route::put('/comments/update', 'CommentsController@update')->name('vinograd.comments.update');
    });
});