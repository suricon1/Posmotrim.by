<?php

Route::group(['domain'	=>	env('APP_DOMAIN')], function(){
    Route::group(['namespace'=>'Site'], function() {
        Route::get('/', 'SiteController@index')->name('home');
        //Route::get('/article/{alias}.html', 'SiteController@article')->name('site.article');
        Route::get('/article/{alias}.html', 'SiteController@article')->name('site.article');

        Route::get('/lions/{region}.html', 'SiteController@lions')->name('site.lions');

        Route::get('/section/{region}.html', 'SiteController@section')->where(['region'=>'[a-z0-9_-]*'])->name('site.section');
        Route::get('/section/{region}/page-{page}.html', 'SiteController@section')->where(['region'=>'[a-z0-9_-]*', 'page'=>'[0-9]*']);
        Route::get('/section/{region}/{tag}.html', 'SiteController@sectionTag')->where(['region'=>'[a-z0-9_-]*', 'tag'=>'[a-z0-9_-]*'])->name('site.section.tag');
        Route::get('/section/{region}/{tag}/page-{page}.html', 'SiteController@sectionTag')->where(['region'=>'[a-z0-9_-]*', 'tag'=>'[a-z0-9_-]*', 'page'=>'[0-9]*']);

        Route::match(['get', 'post'],'/search', 'SearchController@index')->name('search');
        //
        //    Route::get('/sitemap', 'SitemapController@index')->name('sitemap');
        //    Route::get('/sitemap/country/{countri}.html', 'SitemapController@countri')->where(['countri'=>'[0-9]*'])->name('sitemap.countri');
        //    Route::get('/sitemap/country/{countri}/page-{page}.html', 'SitemapController@countri')->where(['countri'=>'[0-9]*', 'page'=>'[0-9]*']);
        //    Route::get('/sitemap/city/{city}.html', 'SitemapController@city')->name('sitemap.city');

        Route::post('/subscribe', 'SubsController@subscribe')->name('subscribers');
        Route::get('/verify/{token}', 'SubsController@verify')->name('verify');

        Route::get('/ajax/login-form', 'AjaxController@loginForm');
        Route::post('/ajax/login', 'AjaxController@login');

        Route::post('/comment', 'CommentController@store')->name('comment.add');
        Route::post('/ajax/comment', 'CommentController@ajaxStore')->name('ajax-comment.add');

        Route::group(['middleware'	=>	'auth'], function(){
            Route::post('/ajax/comment-edit', 'CommentController@ajaxEdit')->name('ajax.comment.edit');
            Route::post('/ajax/comment-delete', 'CommentController@ajaxDelete')->name('ajax.comment.delete');

            //Route::get('/profile', 'ProfileController@index');
            //Route::post('/profile', 'ProfileController@store');
            Route::post('/logout', 'AuthController@logout')->name('logout');
        });

        Route::group(['middleware'	=>	'guest'], function(){
            Route::get('/register', 'AuthController@registerForm')->name('register.form');
            Route::post('/register', 'AuthController@register')->name('register');
            Route::get('/login','AuthController@loginForm')->name('login.form');
            Route::post('/login', 'AuthController@login')->name('login');
        });

    });

    Route::get('/home', 'HomeController@index')->name('hom');
    Route::get('/test', 'HomeController@test')->name('test');
    Route::get('/post_mage', 'HomeController@post_mage');
    Route::get('/clean_image', 'HomeController@clean_image');
    Route::get('/post_image', 'HomeController@post_content_images');

    Route::get('/foo', function()
    {
        $exitCode = Artisan::call('queue:work');
        //$exitCode = Artisan::call('email:send');
        redirect()->back();
    });

    Route::get('/clear', function() {
        Artisan::call('cache:clear');
        Artisan::call('config:cache');
        Artisan::call('view:clear');
        Artisan::call('route:clear');
        //Artisan::call('backup:clean');
        return "Кэш очищен.";
    });
});