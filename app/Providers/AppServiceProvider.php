<?php

namespace App\Providers;

use App\Admin\PostCategory;
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
        /**
         * ADMIN
         */

        //Post category parent options
        view()->composer('admin.post-categories.parent-options', function ($view) {

            $exceptId = request()->route()->parameter('post_category') !== null ? request()->route()->parameter('post_category')->id : 0;

            $parents = PostCategory::rootParent($exceptId);
            $view->with(compact('parents'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
