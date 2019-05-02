<?php

namespace App\Providers;

use App\cart\Cart;
use App\cart\cost\calculator\SimpleCost;
use App\cart\storage\SessionStorage;
use App\Models\Site\Comment;
use App\Models\Site\Post;
use App\Repositories\PostRepository;
use App\Repositories\RegionRepository;
use App\UseCases\LookService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.components.sidebar', function($view) {
            $view->with('newCommentsCount', Comment::getNewCommentsCount());
            $view->with('newPostsCount', Post::getNewPostsCount());
        });

        $this->getLooksProduct();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Repositories\PostRepository', function () {
            return new PostRepository(new RegionRepository());
        });

        $this->app->singleton(Cart::class, function () {
            return new Cart(new SessionStorage('cart'), new SimpleCost());
        });
    }

    private function getLooksProduct()
    {
        view()->composer('vinograd.components.look-product', function($view) {
            $view->with('looks', LookService::getLookProducts());
        });
    }
}
