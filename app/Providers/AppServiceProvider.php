<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        if(Schema::hasTable('categories')) {
//            $categories = Category::all()->pluck('name')->toArray();
//            View::share(compact('categories') );
//        }
        View::composer('*', function ($view){
            $categories = Category::all()->pluck('name')->toArray();
            $view->with('categories' , $categories );
        });


    }
}
