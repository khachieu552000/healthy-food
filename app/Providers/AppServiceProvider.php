<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Composer;
use App\Models\DanhMuc;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->Composer('pages.layouts.header', function($view){
            $danhmuc = DanhMuc::all();
            $view->with('danhmuc',$danhmuc);
        });
    }
}
