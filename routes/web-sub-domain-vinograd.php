<?php

Route::group(['domain'	=>	env('APP_DOMAIN_VINOGRAD')], function(){
    Route::group(['namespace' => 'Vinograd', 'as' => 'vinograd.'], function() {
        Route::get('/', 'VinogradController@index')->name('home');

        Route::get('/product/{slug}.html', 'VinogradController@product')->name('product');

        Route::get('/category.html', 'VinogradController@category')->name('category');
        Route::get('/category/page-{page}.html', 'VinogradController@category')->where(['page'=>'[0-9]*']);
        Route::get('/category/{slug}.html', 'VinogradController@categorySlug')->name('category.section');
        Route::get('/category/{slug}/page-{page}.html', 'VinogradController@categorySlug')->where(['slug'=>'[a-z0-9_-]*', 'page'=>'[0-9]*']);

        Route::post('/comment', 'CommentController@store')->name('comment.add');
        Route::post('/ajax/comment', 'CommentController@ajaxStore')->name('ajax-comment.add');

        Route::group(['prefix'=>'cart', 'as' => 'cart.'], function() {
            Route::get('/', 'CartController@index')->name('ingex');
            Route::post('/add/', 'CartController@addToCart')->name('add');
            Route::post('/remove', 'CartController@remove')->name('remove');
            Route::post('/quantity', 'CartController@quantity')->name('quantity');
        });

        Route::group(['middleware'	=>	'auth'], function(){
            Route::post('/ajax/comment-edit', 'CommentController@ajaxEdit');
            Route::post('/ajax/comment-delete', 'CommentController@ajaxDelete');

            Route::post('/logout', 'AuthController@logout')->name('logout');

            Route::group(['namespace'=>'Cabinet', 'prefix'=>'cabinet', 'as' => 'cabinet.'], function() {
                Route::get('/', 'DashboardController@index')->name('home');

                Route::group(['prefix'=>'wishlist', 'as' => 'wishlist.'], function() {
                    Route::get('/', 'WishlistController@index')->name('ingex');
                    Route::get('/add/{id}', 'WishlistController@addToWishlist')->name('add')->where('id','[0-9]*');
                    Route::post('/delete', 'WishlistController@deleteFromWishlist')->name('delete');
                });
            });
        });

        Route::get('/ajax/login-form', 'AjaxController@loginForm');
        Route::post('/ajax/login', 'AjaxController@login');

        Route::group(['middleware'	=>	'guest'], function(){
            Route::get('/login','AuthController@loginForm')->name('login.form');
            Route::post('/login', 'AuthController@login')->name('login');
        });

        Route::get('/ajax/singleProduct', 'AjaxController@modalProduct');
    });
});